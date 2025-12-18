<?php

namespace Database\Factories;

use App\Models\Vehicle;
use App\Models\VehicleBrand;
use App\Models\VehicleModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class VehicleFactory extends Factory
{
    protected $model = Vehicle::class;

    public function definition()
    {
        // Get a random brand
        $brand = VehicleBrand::inRandomOrder()->first();
        // Get a model belonging to that brand
        $model = VehicleModel::where('brand_id', $brand->id)->inRandomOrder()->first();

        return [
            'plate_number' => strtoupper($this->faker->bothify('RAB ### ?')),
            'brand_id' => $brand->id,
            'model_id' => $model->id,
            'manufacture_year' => $this->faker->numberBetween(2000, 2024),
            'color' => $this->faker->safeColorName(),
            'vin' => strtoupper($this->faker->bothify('VIN##########')),
            'mirror_engraving_code' => 'ENGR-' . $this->faker->unique()->numerify('####'),
        ];
    }
}