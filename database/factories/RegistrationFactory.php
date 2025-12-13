<?php

namespace Database\Factories;

use App\Models\Registration;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class RegistrationFactory extends Factory
{
    protected $model = Registration::class;

    public function definition()
    {
        return [
            'registration_number' => 'BRNY-' . now()->format('Ym') . '-' . str_pad($this->faker->unique()->numberBetween(1, 9999), 4, '0', STR_PAD_LEFT),
            'vehicle_id' => null,
            'owner_id' => null,
            'agent_id' => null,
            'status' => $this->faker->randomElement(['DRAFT','PENDING','VALIDATED']),
            'validated_by' => null,
            'validated_at' => null,
            'notes' => $this->faker->optional()->sentence(),
        ];
    }
}
