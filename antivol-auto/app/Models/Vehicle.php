<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = ['plate_number', 'brand_id', 'model_id', 'manufacture_year', 'color', 'vin', 'mirror_engraving_code'];

    public function brand()
    {
        return $this->belongsTo(VehicleBrand::class);
    }

    public function model()
    {
        return $this->belongsTo(VehicleModel::class);
    }

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }
}