<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehiclePhoto extends Model
{
    protected $fillable = ['registration_id', 'type', 'path'];

    public function registration()
    {
        return $this->belongsTo(Registration::class);
    }
}