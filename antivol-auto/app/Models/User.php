<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected  = [
        'name',
        'email',
        'phone',
        'password',
        'role',
        'status',
        'last_login_at',
    ];

    protected  = [
        'password',
        'remember_token',
    ];

    protected  = [
        'last_login_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function client()
    {
        return ->hasOne(Client::class);
    }

    public function agent()
    {
        return ->hasOne(Agent::class);
    }

    public function auditLogs()
    {
        return ->hasMany(AuditLog::class);
    }

    public function isAdmin()
    {
        return ->role === 'admin';
    }

    public function isAgent()
    {
        return ->role === 'agent';
    }

    public function isClient()
    {
        return ->role === 'client';
    }
}
