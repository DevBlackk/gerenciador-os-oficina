<?php

declare(strict_types=1);

namespace App\Http\Actions\Customer;

use Illuminate\Support\Facades\DB;

class DeleteCostumer
{
    public function execute(string $uuid): void
    {
        DB::table('customers')
            ->where('uuid', $uuid)
            ->delete();
    }
}
