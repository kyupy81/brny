<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Vehicle;

class VehiclePolicy
{
    public function before(User $user, $ability)
    {
        if ($user->hasRole('admin')) return true;
    }

    public function view(User $user, Vehicle $vehicle)
    {
        if ($user->hasRole('agent')) {
            // agent can view vehicles they have registrations for
            return $vehicle->registrations()->where('agent_id', $user->id)->exists();
        }
        if ($user->hasRole('client')) {
            return $vehicle->current_owner_id && $vehicle->currentOwner && $vehicle->currentOwner->user_id === $user->id;
        }
        return false;
    }

    public function reportTheft(User $user, Vehicle $vehicle)
    {
        // agents and clients with ownership can report
        if ($user->hasRole('agent')) return true;
        if ($user->hasRole('client')) {
            return $vehicle->current_owner_id && $vehicle->currentOwner && $vehicle->currentOwner->user_id === $user->id;
        }
        return false;
    }
}
