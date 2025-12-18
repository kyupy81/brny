<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Agent;
use Illuminate\Support\Facades\Hash;
use Livewire\WithPagination;

class AdminAgentsCrud extends Component
{
    use WithPagination;

    public $name, $email, $phone, $zone, $agentId;
    public $isModalOpen = false;

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email|unique:users,email',
        'phone' => 'required',
        'zone' => 'required',
    ];

    public function render()
    {
        return view('livewire.admin-agents-crud', [
            'agents' => Agent::with('user')->paginate(10),
        ]);
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->zone = '';
        $this->agentId = null;
    }

    public function store()
    {
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'password' => Hash::make('password'), // Default password
            'role' => 'agent',
            'status' => 'active',
        ]);

        Agent::create([
            'user_id' => $user->id,
            'zone' => $this->zone,
        ]);

        session()->flash('message', 'Agent Created Successfully.');
        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $agent = Agent::findOrFail($id);
        $this->agentId = $id;
        $this->name = $agent->user->name;
        $this->email = $agent->user->email;
        $this->phone = $agent->user->phone;
        $this->zone = $agent->zone;

        $this->openModal();
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'phone' => 'required',
            'zone' => 'required',
        ]);

        $agent = Agent::findOrFail($this->agentId);
        $agent->update([
            'zone' => $this->zone,
        ]);

        $agent->user->update([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
        ]);

        session()->flash('message', 'Agent Updated Successfully.');
        $this->closeModal();
        $this->resetInputFields();
    }

    public function delete($id)
    {
        $agent = Agent::findOrFail($id);
        $agent->user->delete(); // Soft delete user
        $agent->delete();
        session()->flash('message', 'Agent Deleted Successfully.');
    }
}