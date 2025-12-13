<?php

namespace App\Services;

use App\Models\AuditLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class AuditService
{
    public static function log(string , ?string  = null, ?int  = null, ?array  = null)
    {
        AuditLog::create([
            'user_id' => Auth::id(),
            'action' => ,
            'entity' => ,
            'entity_id' => ,
            'meta_json' => ,
            'ip' => Request::ip(),
            'user_agent' => Request::userAgent(),
        ]);
    }
}
