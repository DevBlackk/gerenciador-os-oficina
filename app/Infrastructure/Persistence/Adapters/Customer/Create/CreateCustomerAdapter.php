<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Adapters\Customer\Create;

use App\Domain\Customer\Entities\Customer;
use App\Domain\Customer\Gateways\Create\CreateCustomerGateway;
use Illuminate\Support\Facades\DB;

class CreateCustomerAdapter implements CreateCustomerGateway
{

    public function create(Customer $customer): int
    {
        return DB::table('customers')->insertGetId([
            'name' => $customer->getName(),
            'phone' => $customer->getPhone(),
            'cpf' => $customer->getCpf(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
