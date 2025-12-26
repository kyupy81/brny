<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'phone', 'address', 'commune', 'quartier', 'city_id', 'commune_id'];

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function communeRel()
    {
        return $this->belongsTo(Commune::class, 'commune_id');
    }
}
