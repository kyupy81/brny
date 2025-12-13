<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marking extends Model
{
    use HasFactory;

    protected  = [
        'vehicle_id',
        'code',
        'qr_path',
        'marking_type',
        'marked_at',
        'agent_id',
        'zone',
    ];

    protected  = [
        'marked_at' => 'datetime',
    ];

    public function vehicle()
    {
        return ->belongsTo(Vehicle::class);
    }

    public function agent()
    {
        return ->belongsTo(User::class, 'agent_id');
    }
}
