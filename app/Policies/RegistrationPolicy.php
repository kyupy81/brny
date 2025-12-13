<?php

namespace App\Policies;

use App\Models\Registration;
use App\Models\User;

class RegistrationPolicy
{
    public function before(User $user, $ability)
    {
        // allow admins to do everything
        if ($user->hasRole('admin')) {
            return true;
        }
    }

    public function view(User $user, Registration $registration)
    {
        if ($user->hasRole('agent')) {
            return $registration->agent_id === $user->id;
        }
        // clients can view if they own the registration's owner is linked to their user
        if ($user->hasRole('client')) {
            return $registration->owner && $registration->owner->user_id === $user->id;
        }
        return false;
    }

    public function create(User $user)
    {
        return $user->hasRole('agent');
    }

    public function update(User $user, Registration $registration)
    {
        return $user->hasRole('agent') && $registration->agent_id === $user->id;
    }

    public function validate(User $user, Registration $registration)
    {
        // only admin (handled in before) or specific permission
        return $user->hasPermissionTo('registrations.validate');
    }
}
