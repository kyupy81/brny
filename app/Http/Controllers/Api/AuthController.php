<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\OtpCode;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required_without:phone|email',
            'phone' => 'required_without:email|regex:/^\+?[0-9]{9,15}$/',
            'password' => 'required|string|min:6',
        ]);

        $email = $request->filled('email') ? trim($request->email) : null;
        $phone = $request->filled('phone') ? trim($request->phone) : null;

        $user = $email 
            ? User::where('email', $email)->first()
            : User::where('phone', $phone)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            Log::warning('Failed login attempt', ['email' => $email, 'phone' => $phone]);
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $token = $user->createToken('api-token')->plainTextToken;
        Log::info('User logged in', ['user_id' => $user->id]);
        
        return response()->json([
            'token' => $token, 
            'user' => $user->only(['id', 'name', 'email', 'phone'])
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        Log::info('User logged out', ['user_id' => $request->user()->id]);
        
        return response()->json(['message' => 'Logged out successfully']);
    }

    public function requestOtp(Request $request)
    {
        $request->validate(['phone' => 'required|regex:/^\+?[0-9]{9,15}$/']);
        
        $phone = trim($request->phone);
        
        // Vérifier si trop de requêtes OTP récentes
        $recentOtp = OtpCode::where('phone', $phone)
            ->where('created_at', '>', now()->subMinutes(1))
            ->count();
            
        if ($recentOtp >= 3) {
            Log::warning('OTP rate limit exceeded', ['phone' => $phone]);
            return response()->json([
                'message' => 'Too many requests. Please try again later.'
            ], 429);
        }

        // Générer OTP sécurisé
        $code = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        
        OtpCode::create([
            'phone' => $phone,
            'code' => $code,
            'expires_at' => now()->addMinutes(5),
            'used' => false,
        ]);

        Log::info('OTP requested', ['phone' => $phone]);
        
        // En production: envoyer SMS via Twilio/Africa's Talking
        // Pour développement: retourner le code
        return response()->json([
            'message' => 'OTP sent successfully',
            'code' => config('app.debug') ? $code : null // Uniquement en debug
        ]);
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'phone' => 'required|regex:/^\+?[0-9]{9,15}$/',
            'code' => 'required|string|size:6'
        ]);

        $phone = trim($request->phone);
        $code = trim($request->code);

        $otp = OtpCode::where('phone', $phone)
            ->where('code', $code)
            ->where('used', false)
            ->where('expires_at', '>', now())
            ->first();

        if (!$otp) {
            Log::warning('Invalid OTP verification attempt', ['phone' => $phone]);
            return response()->json(['message' => 'Invalid or expired code'], 422);
        }

        // Marquer l'OTP comme utilisé
        $otp->update(['used' => true, 'used_at' => now()]);

        // Créer ou récupérer l'utilisateur
        $user = User::firstOrCreate(
            ['phone' => $phone],
            ['name' => 'User ' . Str::random(5)]
        );

        $token = $user->createToken('client-token')->plainTextToken;

        Log::info('User verified via OTP', ['user_id' => $user->id, 'phone' => $phone]);

        return response()->json([
            'token' => $token,
            'user' => $user->only(['id', 'name', 'email', 'phone'])
        ]);
    }
}