<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\OtpCode;
use Illuminate\Http\Request;
use Carbon\Carbon;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->get()->map(function ($user) {
            return [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user->roles->pluck('name')->join(', ') ?: 'User',
                'status' => $user->status ?? 'active',
            ];
        });

        return view('admin.users.index', compact('users'));
    }

    public function action(Request $request, User $user)
    {
        $request->validate([
            'otp' => 'required|digits:6',
            'action' => 'required|in:freeze,delete',
        ]);

        $admin = auth()->user();

        // Verify OTP
        $otpRecord = OtpCode::where('user_id', $admin->id)
            ->where('expires_at', '>', Carbon::now())
            ->latest()
            ->first();

        if (!$otpRecord) {
            return response()->json(['message' => 'Code OTP invalide ou expiré.'], 422);
        }

        // Timing attack safe comparison
        if (!hash_equals((string) $otpRecord->code, (string) $request->otp)) {
            return response()->json(['message' => 'Code OTP incorrect.'], 422);
        }

        // Consume OTP
        $otpRecord->delete();

        // Perform Action
        if ($request->action === 'freeze') {
            $user->status = $user->status === 'active' ? 'frozen' : 'active';
            $user->save();
            $message = $user->status === 'active' ? 'Compte réactivé.' : 'Compte gelé.';
        } elseif ($request->action === 'delete') {
            $user->delete();
            $message = 'Compte supprimé.';
        }

        return response()->json(['message' => $message]);
    }
}

