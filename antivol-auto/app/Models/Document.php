<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected  = ['vehicle_id', 'doc_type', 'file_path', 'uploaded_by'];

    public function vehicle()
    {
        return ->belongsTo(Vehicle::class);
    }
}
