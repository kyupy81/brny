<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vehicle extends Model
{
    protected $guarded = [];

    public function currentOwner(): BelongsTo
    {
        return $this->belongsTo(Owner::class, 'current_owner_id');
    }

    public function registrations(): HasMany
    {
        return $this->hasMany(Registration::class);
    }

    public function photos(): HasMany
    {
        return $this->hasMany(VehiclePhoto::class);
    }
}
