<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CorrectionTicket extends Model
{
    use HasFactory;

    protected  = ['client_id', 'vehicle_id', 'message', 'status'];

    public function client()
    {
        return ->belongsTo(Client::class);
    }

    public function vehicle()
    {
        return ->belongsTo(Vehicle::class);
    }
}
