<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Vehicle;

class ClientVehiclesList extends Component
{
    public function render()
    {
         = Vehicle::whereHas('client', function () {
            ->where('user_id', Auth::id());
        })->with(['marking', 'documents'])->latest()->get();

        return view('livewire.client-vehicles-list', [
            'vehicles' => 
        ]);
    }
}
