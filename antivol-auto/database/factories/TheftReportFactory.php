<?php

namespace Database\Factories;

use App\Models\TheftReport;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

class TheftReportFactory extends Factory
{
    protected $model = TheftReport::class;

    public function definition()
    {
        return [
            'vehicle_id' => Vehicle::factory(),
            'reported_by' => User::factory(),
            'reported_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'location' => $this->faker->address(),
            'description' => $this->faker->sentence(),
            'status' => $this->faker->randomElement(['OPEN', 'RESOLVED']),
        ];
    }
}
