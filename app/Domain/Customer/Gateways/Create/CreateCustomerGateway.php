<?php

namespace App\Domain\Customer\Gateways\Create;

use App\Domain\Customer\Entities\Customer;

interface CreateCustomerGateway
{
    public function create(Customer $customer): int;
}
