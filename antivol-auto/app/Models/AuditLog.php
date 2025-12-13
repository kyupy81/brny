<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditLog extends Model
{
    use HasFactory;

    protected  = [
        'user_id',
        'action',
        'entity',
        'entity_id',
        'meta_json',
        'ip',
        'user_agent',
    ];

    protected  = [
        'meta_json' => 'array',
    ];

    public function user()
    {
        return ->belongsTo(User::class);
    }
}
