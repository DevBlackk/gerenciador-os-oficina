<?php

declare(strict_types=1);

namespace App\Http\Actions\Customers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CreateCustomer
{
    public function execute(array $data): string
    {
        $uuid = (string) Str::uuid();

        DB::table('customers')->insert([
            'uuid' => $uuid,
            'name' => $data['name'],
            'phone' => $data['phone'],
            'cpf' => $data['cpf'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return $uuid;
    }
}
