<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    // ✅ Utiliser $fillable au lieu de $guarded
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'preferences',
        'is_phone_verified',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'pin',
        'api_token',
    ];

    protected $casts = [
        'preferences' => 'array',
        'is_phone_verified' => 'boolean',
        'email_verified_at' => 'datetime',
    ];

    public function registrations(): HasMany
    {
        return $this->hasMany(Registration::class, 'agent_id');
    }

    public function theftReports(): HasMany
    {
        return $this->hasMany(TheftReport::class, 'reported_by_user_id');
    }
}