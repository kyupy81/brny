<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Agent;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminAgentsCrud extends Component
{
    public , , , , ;
    public  = false;

    protected  = [
        'name' => 'required|min:3',
        'email' => 'required|email|unique:users,email',
        'phone' => 'required|unique:users,phone',
        'matricule' => 'required|unique:agents,matricule',
        'zone' => 'required',
    ];

    public function create()
    {
        ->reset(['name', 'email', 'phone', 'matricule', 'zone']);
        ->isCreating = true;
    }

    public function cancel()
    {
        ->isCreating = false;
    }

    public function store()
    {
        ->validate();

         = Str::random(10); // Generate random password

         = User::create([
            'name' => ->name,
            'email' => ->email,
            'phone' => ->phone,
            'password' => Hash::make(),
            'role' => 'agent',
            'status' => 'active',
        ]);

        Agent::create([
            'user_id' => ->id,
            'matricule' => ->matricule,
            'zone' => ->zone,
        ]);

        ->isCreating = false;
        session()->flash('message', "Agent créé avec succès. Mot de passe temporaire : {}");
    }

    public function render()
    {
         = Agent::with('user')->latest()->get();
        return view('livewire.admin-agents-crud', ['agents' => ]);
    }
}
