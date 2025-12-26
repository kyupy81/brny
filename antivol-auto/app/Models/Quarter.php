<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Quarter extends Model
{
    protected $fillable = ['commune_id', 'name', 'slug', 'is_active'];

    public function commune(): BelongsTo
    {
        return $this->belongsTo(Commune::class);
    }
}
