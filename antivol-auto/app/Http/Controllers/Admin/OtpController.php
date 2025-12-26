<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OtpCode;
use App\Mail\OtpMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;

class OtpController extends Controller
{
    public function generate(Request $request)
    {
        $user = auth()->user();
        
        // Generate 6 digit code
        $code = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        
        // Store in DB
        OtpCode::create([
            'user_id' => $user->id,
            'code' => $code, 
            'expires_at' => Carbon::now()->addMinutes(10),
        ]);

        // Send Mail
        try {
            Mail::to($user->email)->send(new OtpMail($code));
            return response()->json(['message' => 'Code envoyé avec succès.']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erreur lors de l\'envoi du mail: ' . $e->getMessage()], 500);
        }
    }
}

