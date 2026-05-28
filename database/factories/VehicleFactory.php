<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Random\RandomException;

class VehicleFactory extends Factory
{
    /**
     * @throws RandomException
     */
    public function definition(): array
    {
        $brands = ['Toyota', 'Honda', 'Ford', 'Chevrolet', 'Volkswagen', 'Fiat', 'Hyundai', 'Nissan'];
        $models = ['Civic', 'Focus', 'Onix', 'Gol', 'HB20', 'Versa', 'Corolla', 'Accord'];

        return [
            'customer_uuid' => Customer::factory(),
            'plate' => strtoupper(Str::random(3)) . '-' . random_int(1000, 9999),
            'brand' => $this->faker->randomElement($brands),
            'model' => $this->faker->randomElement($models),
            'year' => random_int(2010, 2026),
        ];
    }
}
