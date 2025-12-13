<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected  = ['user_id', 'address', 'id_type', 'id_number'];

    public function user()
    {
        return ->belongsTo(User::class);
    }

    public function vehicles()
    {
        return ->hasMany(Vehicle::class);
    }
}
