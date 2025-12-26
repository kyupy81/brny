<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class AgentBadgeController extends Controller
{
    public function show(User $user)
    {
        if (!$user->hasRole('agent')) {
            abort(404, "Cet utilisateur n'est pas un agent.");
        }

        $verificationUrl = route('verify.agent', ['agent_code' => $user->agent_code]);
        
        $qrCode = QrCode::size(150)->generate($verificationUrl);

        return view('admin.agents.badge', compact('user', 'qrCode'));
    }
}
