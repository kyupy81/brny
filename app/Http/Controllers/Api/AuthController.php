<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\OtpCode;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required_without:phone|email',
            'phone' => 'required_without:email',
            'password' => 'required',
        ]);

        if ($request->filled('email')) {
            $user = User::where('email', $request->email)->first();
        } else {
            $user = User::where('phone', $request->phone)->first();
        }

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $token = $user->createToken('api-token')->plainTextToken;
        return response()->json(['token' => $token, 'user' => $user]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logged out']);
    }

    public function requestOtp(Request $request)
    {
        $request->validate(['phone' => 'required']);
        $phone = $request->phone;
        // Create OTP (simple implementation)
        $code = rand(100000, 999999);
        OtpCode::create([
            'phone' => $phone,
            'code' => $code,
            'expires_at' => now()->addMinutes(5),
        ]);

        // TODO: integrate SMS provider (Twilio/Africa's Talking)

        return response()->json(['message' => 'OTP sent (dev)', 'code' => $code]);
    }

    public function verifyOtp(Request $request)
    {
        $request->validate(['phone' => 'required', 'code' => 'required']);
        $otp = OtpCode::where('phone', $request->phone)->where('code', $request->code)->where('used', false)->where('expires_at', '>', now())->first();
        if (!$otp) {
            return response()->json(['message' => 'Invalid or expired code'], 422);
        }

        $otp->used = true;
        $otp->save();

        $user = User::firstOrCreate(['phone' => $request->phone], ['name' => null]);
        $token = $user->createToken('client-token')->plainTextToken;

        return response()->json(['token' => $token, 'user' => $user]);
    }
}
