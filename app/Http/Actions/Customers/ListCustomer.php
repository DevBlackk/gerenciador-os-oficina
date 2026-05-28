<?php

declare(strict_types=1);

namespace App\Http\Actions\Customers;

use Illuminate\Support\Facades\DB;

class ListCustomer
{
    public function execute(): \Illuminate\Support\Collection
    {
        return DB::table('customers')
            ->select(
                'customers.uuid as customer_uuid',
                'customers.name as customer_name',
                'customers.phone as customer_phone',
                'customers.cpf as customer_cpf',
                'vehicles.uuid as vehicle_uuid',
                'vehicles.plate',
                'vehicles.brand',
                'vehicles.model',
                'vehicles.year'
            )
            ->leftJoin('vehicles', 'customers.uuid', '=', 'vehicles.customer_uuid')
            ->get()
            ->groupBy('customer_uuid')
            ->map(function ($items) {
                $customer = $items->first();

                return [
                    'uuid' => $customer->customer_uuid,
                    'name' => $customer->customer_name,
                    'phone' => $customer->customer_phone,
                    'cpf' => $customer->customer_cpf,

                    'vehicles' => $items->whereNotNull('vehicle_uuid')->map(function ($item) {
                        return [
                            'uuid' => $item->vehicle_uuid,
                            'plate' => $item->plate,
                            'brand' => $item->brand,
                            'model' => $item->model,
                            'year' => $item->year,
                        ];
                    })->values()->all(),
                ];
            })
            ->values();
    }
}
