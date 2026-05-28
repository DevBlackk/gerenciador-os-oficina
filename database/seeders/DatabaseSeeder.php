<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\OrderItem;
use App\Models\ServiceOrder;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Random\RandomException;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
//        // Criar um usuário de teste
//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);

        // Criar 5 clientes
        Customer::factory(5)->create()->each(/**
         * @throws RandomException
         */ function ($customer) {
            // Cada cliente tem 2-3 veículos
            Vehicle::factory(random_int(2, 3))->create([
                'customer_uuid' => $customer->uuid,
            ])->each(/**
             * @throws RandomException
             */ function ($vehicle) {
                // Cada veículo tem 1-2 ordens de serviço
                ServiceOrder::factory(random_int(1, 2))->create([
                    'vehicle_uuid' => $vehicle->uuid,
                ])->each(/**
                 * @throws RandomException
                 */ function ($serviceOrder) {
                    // Cada ordem de serviço tem 2-4 itens
                    OrderItem::factory(random_int(2, 4))->create([
                        'service_order_uuid' => $serviceOrder->uuid,
                    ]);
                });
            });
        });
    }
}
