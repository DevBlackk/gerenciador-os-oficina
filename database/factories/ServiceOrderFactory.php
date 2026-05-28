<?php

namespace Database\Factories;

use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceOrderFactory extends Factory
{
    public function definition(): array
    {
        $statuses = ['estimate', 'approved', 'in_progress', 'finished', 'canceled'];
        $problems = [
            'Troca de óleo e filtro',
            'Revisão dos freios',
            'Alinhamento de rodas',
            'Troca de pneus',
            'Reparo de correia',
            'Substituição de velas',
            'Limpeza de bico injetor',
            'Troca de fluído de freio',
        ];

        return [
            'vehicle_uuid' => Vehicle::factory(),
            'status' => $this->faker->randomElement($statuses),
            'problem_description' => $this->faker->randomElement($problems),
            'total_value' => $this->faker->randomFloat(2, 100, 2000),
        ];
    }
}
