<?php

namespace Database\Factories;

use App\Models\Registration;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class RegistrationFactory extends Factory
{
    protected $model = Registration::class;

    public function definition()
    {
        $status = $this->faker->randomElement(['PENDING', 'ACTIVE', 'STOLEN']);
        $agent = User::where('role', 'agent')->inRandomOrder()->first() ?? User::factory()->create(['role' => 'agent']);
        
        $validatedBy = null;
        $validatedAt = null;

        if ($status !== 'PENDING') {
            $validatedBy = User::where('role', 'admin')->inRandomOrder()->first()->id ?? $agent->id;
            $validatedAt = $this->faker->dateTimeBetween('-1 year', 'now');
        }

        return [
            'registration_number' => 'BRNY-' . now()->format('Ym') . '-' . str_pad($this->faker->unique()->numberBetween(1, 99999), 5, '0', STR_PAD_LEFT),
            'vehicle_id' => null, // Set in seeder
            'owner_id' => null, // Set in seeder
            'status' => $status,
            'created_by' => $agent->id,
            'validated_by' => $validatedBy,
            'validated_at' => $validatedAt,
            'notes' => $this->faker->optional()->sentence(),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}