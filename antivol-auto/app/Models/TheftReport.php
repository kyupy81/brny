<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TheftReport extends Model
{
    use HasFactory;

    protected $fillable = ['vehicle_id', 'reported_by', 'reported_at', 'location', 'description', 'status'];

    protected $casts = [
        'reported_at' => 'datetime',
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function reporter()
    {
        return $this->belongsTo(User::class, 'reported_by');
    }
}

