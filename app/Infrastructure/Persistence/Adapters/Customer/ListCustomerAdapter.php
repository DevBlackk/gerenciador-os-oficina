<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Adapters\Customer;

use App\Domain\Customer\List\Gateways\ListCustomerGateway;
use Illuminate\Support\Facades\DB;

class ListCustomerAdapter implements ListCustomerGateway
{

    public function list(): array
    {
        return DB::table('customers')
            ->select('id', 'name', 'phone', 'cpf')
            ->get()
            ->toArray();
    }
}
