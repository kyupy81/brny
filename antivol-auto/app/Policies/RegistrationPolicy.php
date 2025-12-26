<?php

namespace App\Policies;

use App\Models\Registration;
use App\Models\User;

class RegistrationPolicy
{
    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Registration $registration): bool
    {
        return $user->id === $registration->created_by || $user->role === 'admin';
    }

    /**
     * Determine whether the user can declare theft.
     */
    public function declareTheft(User $user, Registration $registration): bool
    {
        return $user->id === $registration->created_by;
    }
}
