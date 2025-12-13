<?php

namespace App\Policies;

use App\Models\Owner;
use App\Models\User;

class OwnerPolicy
{
    public function before(User $user, $ability)
    {
        if ($user->hasRole('admin')) return true;
    }

    public function view(User $user, Owner $owner)
    {
        if ($user->hasRole('agent')) return true; // agents can view owners
        if ($user->hasRole('client')) {
            return $owner->user_id === $user->id;
        }
        return false;
    }

    public function update(User $user, Owner $owner)
    {
        if ($user->hasRole('agent')) return true;
        if ($user->hasRole('client')) return $owner->user_id === $user->id;
        return false;
    }
}
