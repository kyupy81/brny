<?php

namespace Database\Factories;

use App\Models\TheftReport;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TheftReportFactory extends Factory
{
    protected $model = TheftReport::class;

    public function definition()
    {
        return [
            'registration_id' => null, // Set in seeder
            'reported_by' => User::where('role', 'agent')->inRandomOrder()->first()->id ?? null,
            'reported_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'location' => $this->faker->address(),
            'description' => $this->faker->sentence(),
            'status' => $this->faker->randomElement(['OPEN', 'RESOLVED']),
        ];
    }
}