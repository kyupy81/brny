<?php

namespace Database\Factories;

use App\Models\VehiclePhoto;
use Illuminate\Database\Eloquent\Factories\Factory;

class VehiclePhotoFactory extends Factory
{
    protected $model = VehiclePhoto::class;

    public function definition()
    {
        return [
            'registration_id' => null,
            'vehicle_id' => null,
            'type' => $this->faker->randomElement(['plate','mirror_engraving','front','doc']),
            'path' => 'test_images/' . $this->faker->uuid() . '.jpg',
            'thumb_path' => 'test_images/thumbs/' . $this->faker->uuid() . '.jpg',
            'checksum' => null,
            'uploaded_by' => null,
        ];
    }
}
