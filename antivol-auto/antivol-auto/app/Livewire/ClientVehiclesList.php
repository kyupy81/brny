<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Vehicle;

class ClientVehiclesList extends Component
{
    public function render()
    {
        $vehicles = [];
        if (Auth::user()->client) {
            $vehicles = Vehicle::where('client_id', Auth::user()->client->id)
                ->with('markings')
                ->get();
        }

        return view('livewire.client-vehicles-list', [
            'vehicles' => $vehicles
        ]);
    }
}