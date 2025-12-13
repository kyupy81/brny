<?php

namespace Database\Factories;

use App\Models\TheftReport;
use Illuminate\Database\Eloquent\Factories\Factory;

class TheftReportFactory extends Factory
{
    protected $model = TheftReport::class;

    public function definition()
    {
        return [
            'vehicle_id' => null,
            'reported_by_user_id' => null,
            'registration_id' => null,
            'report_date' => now(),
            'description' => $this->faker->sentence(),
            'status' => 'OPEN',
            'police_reference' => null,
        ];
    }
}
