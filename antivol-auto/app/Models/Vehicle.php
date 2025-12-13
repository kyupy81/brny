<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected  = [
        'client_id',
        'plate_number',
        'make',
        'model',
        'color',
        'type',
        'year',
        'vin',
        'status',
    ];

    public function client()
    {
        return ->belongsTo(Client::class);
    }

    public function marking()
    {
        return ->hasOne(Marking::class);
    }

    public function documents()
    {
        return ->hasMany(Document::class);
    }
}
