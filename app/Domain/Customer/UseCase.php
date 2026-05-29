<?php

declare(strict_types=1);

namespace App\Domain\Customer;

readonly class UseCase
{
    public function __construct(
        private Gateways\Create\CreateCustomerGateway $createCustomerGateway,
    ) {
    }

    public function execute(array $data): int
    {
        $customer = new Entities\Customer(
            name: $data['name'],
            phone: $data['phone'],
            cpf: $data['cpf'] ?? null,
        );

        return $this->createCustomerGateway->create($customer);
    }
}
