<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  
     */
    public function handle(Request , Closure , ...): Response
    {
        if (!Auth::check()) {
            return redirect('login');
        }

         = Auth::user();

        if (in_array(->role, )) {
            return ();
        }

        abort(403, 'Unauthorized action.');
    }
}
