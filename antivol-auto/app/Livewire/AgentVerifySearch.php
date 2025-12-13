<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Vehicle;
use App\Models\Marking;

class AgentVerifySearch extends Component
{
    public  = '';
    public  = null;

    public function updatedSearch()
    {
        ->result = null;
    }

    public function verify()
    {
        ->validate([
            'search' => 'required|min:3'
        ]);

        // Search by Plate
         = Vehicle::where('plate_number', ->search)->first();

        // Search by Marking Code
        if (!) {
             = Marking::where('code', ->search)->first();
            if () {
                 = ->vehicle;
            }
        }

        // Search by Client Phone
        if (!) {
             = Vehicle::whereHas('client.user', function () {
                ->where('phone', ->search);
            })->first();
        }

        ->result = ;
    }

    public function render()
    {
        return view('livewire.agent-verify-search');
    }
}
