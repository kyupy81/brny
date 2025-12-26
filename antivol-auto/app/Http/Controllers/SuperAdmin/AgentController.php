<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SuperAdmin\StoreAgentRequest;
use App\Models\User;
use App\Models\Agent;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class AgentController extends Controller
{
    public function create()
    {
        return view('super_admin.agents.create');
    }

    public function store(StoreAgentRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'status' => $request->status,
            'role' => 'agent',
        ]);

        $user->assignRole('agent');

        $agentCode = 'AG-' . strtoupper(Str::random(6));

        Agent::create([
            'user_id' => $user->id,
            'matricule' => $agentCode,
            'zone' => $request->zone ?? 'Default',
        ]);

        Log::info('CREATE_AGENT', ['admin_id' => auth()->id(), 'created_agent_id' => $user->id]);

        return redirect()->route('super_admin.dashboard')->with('success', 'Agent créé avec succès. Code: ' . $agentCode);
    }
}
