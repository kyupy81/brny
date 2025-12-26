<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class City extends Model
{
    protected $fillable = ['country_code', 'name', 'slug', 'is_active'];

    public function communes(): HasMany
    {
        return $this->hasMany(Commune::class);
    }
}
