<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class SupportController extends Controller
{
    public function index()
    {
        \ = User::paginate(10);
        return view('support.index', compact('users'));
    }

    public function generateOtp(Request \)
    {
        \->validate([
            'user_id' => 'required|exists:users,id',
            'action' => 'required|in:freeze,delete',
        ]);

        \ = rand(100000, 999999);
        
        Session::put('support_otp', \);
        Session::put('support_otp_expires', now()->addMinutes(5));
        Session::put('support_action', \->action);
        Session::put('support_target_user', \->user_id);

        Log::info("OTP for Support Action ({\->action}) on User {\->user_id}: {\}");

        return response()->json(['message' => 'Code OTP envoyé par email.']);
    }

    public function verifyOtp(Request \)
    {
        \->validate([
            'otp' => 'required|numeric|digits:6',
        ]);

        \ = Session::get('support_otp');
        \ = Session::get('support_otp_expires');
        \ = Session::get('support_action');
        \ = Session::get('support_target_user');

        if (!\ || !\ || now()->greaterThan(\)) {
            return response()->json(['message' => 'Code OTP expiré ou invalide.'], 422);
        }

        if (\->otp != \) {
            return response()->json(['message' => 'Code OTP incorrect.'], 422);
        }

        \ = User::find(\);
        if (\) {
            if (\ === 'freeze') {
                \->status = (\->status === 'frozen') ? 'active' : 'frozen';
                \->save();
            } elseif (\ === 'delete') {
                \->delete();
            }
        }

        Session::forget(['support_otp', 'support_otp_expires', 'support_action', 'support_target_user']);

        return response()->json(['message' => 'Action effectuée avec succès.']);
    }
}
