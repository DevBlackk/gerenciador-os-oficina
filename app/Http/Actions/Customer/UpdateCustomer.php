<?php

namespace App\Http\Actions\Customer;

use Illuminate\Support\Facades\DB;

class UpdateCustomer
{
    public function execute(string $uuid, string $name, string $phone, string $cpf): void
    {
        DB::table('customers')
            ->where('uuid', $uuid)
            ->update([
                'name' => $name,
                'phone' => $phone,
                'cpf' => $cpf,
                'updated_at' => now(),
            ]);
    }
}
