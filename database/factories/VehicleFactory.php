<?php

namespace Database\Factories;

use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class VehicleFactory extends Factory
{
    protected $model = Vehicle::class;

    public function definition()
    {
        return [
            'plate_number' => strtoupper($this->faker->bothify('RAB ### ?')),
            'vin' => strtoupper($this->faker->bothify('VIN##########')),
            'make' => $this->faker->randomElement(['Toyota','Honda','Nissan','Suzuki','BMW','Mercedes']),
            'model' => $this->faker->word(),
            'color' => $this->faker->safeColorName(),
            'mirror_engraving_code' => 'ENGR-' . $this->faker->unique()->numerify('####'),
            'qr_token' => 'QR-' . Str::random(16),
            'current_owner_id' => null,
            'active_registration_id' => null,
            'status' => 'ACTIVE',
        ];
    }
}
