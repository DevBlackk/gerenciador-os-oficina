<?php

declare(strict_types=1);

namespace App\Domain\Customer\List\Gateways;

interface ListCustomerGateway
{
    public function list(): array;
}
