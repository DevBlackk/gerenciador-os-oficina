<?php

declare(strict_types=1);

namespace App\Domain\Customer\List;

readonly class UseCase
{
    public function __construct(
        private Gateways\ListCustomerGateway $listCustomerGateway,
    ) {
    }

    public function execute(): array
    {
        return $this->listCustomerGateway->list();
    }

}
