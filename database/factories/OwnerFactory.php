<?php

namespace Database\Factories;

use App\Models\Owner;
use Illuminate\Database\Eloquent\Factories\Factory;

class OwnerFactory extends Factory
{
    protected $model = Owner::class;

    public function definition()
    {
        return [
            'user_id' => null,
            'name' => $this->faker->name(),
            'phone' => $this->faker->unique()->numerify('250######'),
            'address' => $this->faker->address(),
            'commune' => $this->faker->city(),
            'piece_identity' => $this->faker->optional()->bothify('ID#######'),
            'notes' => $this->faker->optional()->sentence(),
        ];
    }
}
