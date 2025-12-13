<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Registration;
use App\Policies\RegistrationPolicy;
use App\Models\Vehicle;
use App\Policies\VehiclePolicy;
use App\Models\Owner;
use App\Policies\OwnerPolicy;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Registration::class => RegistrationPolicy::class,
        Vehicle::class => VehiclePolicy::class,
        Owner::class => OwnerPolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();

        // optional global Gate before: allow admin (policies also have before)
        Gate::before(function ($user, $ability) {
            if ($user && method_exists($user, 'hasRole') && $user->hasRole('admin')) {
                return true;
            }
        });
    }
}
