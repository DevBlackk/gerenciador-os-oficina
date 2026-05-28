<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Random\RandomException;

class CustomerFactory extends Factory
{
    /**
     * @throws RandomException
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'phone' => $this->faker->phoneNumber(),
            'cpf' => $this->generateUniqueCPF(),
        ];
    }

    /**
     * @throws RandomException
     */
    private function generateUniqueCPF(): string
    {
        $cpf = '';
        for ($i = 0; $i < 11; $i++) {
            $cpf .= random_int(0, 9);
        }
        return substr($cpf, 0, 3) . '.' . substr($cpf, 3, 3) . '.' . substr($cpf, 6, 3) . '-' . substr($cpf, 9);
    }
}
