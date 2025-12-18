<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TheftReport extends Model
{
    use HasFactory;

    protected $fillable = ['registration_id', 'reported_by', 'reported_at', 'location', 'description', 'status'];

    protected $casts = [
        'reported_at' => 'datetime',
    ];

    public function registration()
    {
        return $this->belongsTo(Registration::class);
    }

    public function reporter()
    {
        return $this->belongsTo(User::class, 'reported_by');
    }
}