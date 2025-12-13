<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;

    protected  = ['user_id', 'matricule', 'zone'];

    public function user()
    {
        return ->belongsTo(User::class);
    }
}
