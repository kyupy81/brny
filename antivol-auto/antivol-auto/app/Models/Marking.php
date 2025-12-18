<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marking extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_id', 'code', 'qr_path', 'marking_type', 'marked_at', 'agent_id', 'zone'
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }
}