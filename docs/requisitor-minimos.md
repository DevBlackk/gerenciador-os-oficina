Documento de Requisitos (MVP) - Sistema Gerenciador de Oficinas

## 1. Visão Geral do Produto

O objetivo deste projeto é desenvolver um sistema próprio de gestão para oficinas mecânicas, focado na criação e acompanhamento de Ordens de Serviço (OS). O grande diferencial do produto é garantir ao dono da oficina a **redução drástica de custos** (eliminando mensalidades abusivas de SaaS) e o **controle total sobre seus dados** (propriedade da tecnologia), entregando um fluxo de trabalho rápido, limpo e direto ao ponto.

## 2. Arquitetura e Stack Tecnológico

Para garantir baixo custo de infraestrutura, alta segurança e agilidade no desenvolvimento da interface, o sistema utilizará a seguinte arquitetura separada (Headless):

* **Back-end (Motor e Regras):** API RESTful desenvolvida em **PHP e Laravel** .
* **Banco de Dados:** **PostgreSQL** (robusto, gratuito e relacional).
* **Front-end (Interface Visual):** **Appsmith** (Plataforma Low-Code, consumindo a API PHP via JSON).

---

## 3. Requisitos Funcionais (O que o sistema fará)

Abaixo estão as funções exclusivas que farão parte deste MVP (CRUDs essenciais):

* **RF01 - Gestão de Clientes:** O sistema deve permitir o cadastro, edição e listagem de clientes contendo Nome, Telefone (WhatsApp) e Documento (CPF/CNPJ).
* **RF02 - Gestão de Veículos:** O sistema deve permitir o cadastro de veículos (Placa, Marca, Modelo e Ano) atrelados obrigatoriamente a um Cliente.
* **RF03 - Abertura de Ordem de Serviço (OS):** O sistema deve permitir a criação de uma nova OS vinculada a um veículo, contendo um campo de texto livre para o relato do problema.
* **RF04 - Gestão de Itens da OS:** O sistema deve permitir a adição de "Peças" e "Serviços" (mão de obra) dentro de uma OS, registrando a descrição, quantidade e valor unitário. O valor total da OS deve ser calculado automaticamente.
* **RF05 - Acompanhamento de Status:** O sistema deve permitir a alteração do status da OS, seguindo um fluxo simples: *Orçamento* ➔ *Aprovado / Em Execução* ➔ *Finalizado* ➔ *Cancelado*.
* **RF06 - Integração Simples com WhatsApp:** Na visualização da OS, deve haver uma ação para gerar uma URL dinâmica que abra o WhatsApp Web/Mobile do cliente com um texto pré-formatado contendo o resumo e o valor do orçamento.

---

## 4. Requisitos Não Funcionais (Como o sistema operará)

* **RNF01 - Comunicação via API:** Todo o processamento de dados ocorrerá exclusivamente no back-end. O PHP não renderizará HTML, apenas receberá e retornará estruturas em **JSON**.
* **RNF02 - Segurança da API:** Os endpoints construídos em PHP devem ser protegidos por autenticação (ex: envio de um Token Bearer via Header da requisição) para garantir que apenas a interface do Appsmith tenha acesso ao banco de dados.
* **RNF03 - Usabilidade:** A interface no Appsmith deve priorizar a velocidade de digitação. Uso de tabelas com busca rápida e formulários em modais para evitar recarregamento de páginas na recepção da oficina.

---

## 5. Estrutura de Banco de Dados (PostgreSQL)

Modelo relacional simplificado para suportar as operações do MVP:

| Tabela | Campos Principais | Relação / Propósito |
| --- | --- | --- |
| **`clientes`** | `id`, `nome`, `telefone`, `documento`, `created_at` | Tabela base de usuários. |
| **`veiculos`** | `id`, `cliente_id`, `placa`, `marca`, `modelo`, `ano` | `cliente_id` é chave estrangeira (FK) referenciando `clientes`. |
| **`ordens_servico`** | `id`, `veiculo_id`, `status`, `relato_problema`, `valor_total` | `veiculo_id` é FK referenciando `veiculos`. O `status` pode ser um tipo `ENUM`. |
| **`os_itens`** | `id`, `os_id`, `tipo` (peca/servico), `descricao`, `qtde`, `valor_unit` | `os_id` é FK referenciando `ordens_servico`. |

---

## 6. Mapeamento de Endpoints da API (Contratos HTTP)

Esta é a lista de rotas que o back-end em PHP precisará disponibilizar para que o Appsmith consuma os dados:

**Clientes e Veículos**

* `GET /api/clientes` (Lista e busca de clientes)
* `POST /api/clientes` (Cria novo cliente)
* `POST /api/veiculos` (Cria novo veículo vinculado ao cliente)

**Ordens de Serviço (O Core do App)**

* `GET /api/ordens-servico` (Lista todas as OSs para popular a tabela/kanban inicial)
* `GET /api/ordens-servico/{id}` (Traz detalhes de uma OS, carregando os dados do cliente, veículo e a lista de itens)
* `POST /api/ordens-servico` (Abre uma nova OS)
* `POST /api/ordens-servico/{id}/itens` (Adiciona uma peça ou serviço na OS)
* `PUT /api/ordens-servico/{id}/status` (Altera o status, ex: aprova o orçamento)


-------------

com base nesses requisitos minimos me ajude a fazer esse projeto
