<?php

namespace App\Domain\Customer\Create\Gateways;

use App\Domain\Customer\Create\Entities\Customer;

interface CreateCustomerGateway
{
    public function create(Customer $customer): int;
}
