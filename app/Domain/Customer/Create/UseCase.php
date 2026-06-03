<?php

declare(strict_types=1);

namespace App\Domain\Customer\Create;

use App\Domain\Customer\Create;

readonly class UseCase
{
    public function __construct(
        private Gateways\CreateCustomerGateway $createCustomerGateway,
    ) {
    }

    public function execute(array $data): int
    {
        $customer = new Create\Entities\Customer(
            name: $data['name'],
            phone: $data['phone'],
            cpf: $data['cpf'] ?? null,
        );

        return $this->createCustomerGateway->create($customer);
    }
}
