<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id', 'plate_number', 'make', 'model', 'color', 'type', 'year', 'vin', 'status'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function markings()
    {
        return $this->hasMany(Marking::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }
}