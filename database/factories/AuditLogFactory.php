<?php

namespace Database\Factories;

use App\Models\AuditLog;
use Illuminate\Database\Eloquent\Factories\Factory;

class AuditLogFactory extends Factory
{
    protected $model = AuditLog::class;

    public function definition()
    {
        return [
            'user_id' => null,
            'action' => $this->faker->randomElement(['registration.created','registration.validated','vehicle.status_changed']),
            'auditable_type' => null,
            'auditable_id' => null,
            'before' => null,
            'after' => null,
            'ip_address' => $this->faker->ipv4(),
            'meta' => null,
            'created_at' => now(),
        ];
    }
}
