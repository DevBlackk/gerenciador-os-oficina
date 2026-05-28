<?php

namespace Database\Factories;

use App\Models\ServiceOrder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Random\RandomException;

class OrderItemFactory extends Factory
{
    /**
     * @throws RandomException
     */
    public function definition(): array
    {
        $types = ['part', 'service'];
        $parts = [
            'Óleo 5W-40',
            'Filtro de óleo',
            'Vela de ignição',
            'Pastilha de freio',
            'Pneu 195/65 R15',
            'Correia de distribuição',
            'Bateria 60Ah',
            'Amortecedor dianteiro',
        ];
        $services = [
            'Mão de obra - revisão',
            'Mão de obra - alinhamento',
            'Mão de obra - balanceamento',
            'Diagnóstico eletrônico',
            'Limpeza de injetor',
            'Teste de bateria',
        ];

        $type = $this->faker->randomElement($types);
        $description = $type === 'part'
            ? $this->faker->randomElement($parts)
            : $this->faker->randomElement($services);

        return [
            'service_order_uuid' => ServiceOrder::factory(),
            'type' => $type,
            'description' => $description,
            'quantity' => random_int(1, 5),
            'unit_price' => $this->faker->randomFloat(2, 30, 500),
        ];
    }
}
