<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Marking;
use App\Models\Vehicle;

class AgentVerifySearch extends Component
{
    public $search_code;
    public $search_plate;
    public $result = null;
    public $error = null;

    public function search()
    {
        $this->reset(['result', 'error']);

        if ($this->search_code) {
            $marking = Marking::where('code', $this->search_code)->with('vehicle.client.user')->first();
            if ($marking) {
                $this->result = $marking;
            } else {
                $this->error = "Code introuvable.";
            }
        } elseif ($this->search_plate) {
            $vehicle = Vehicle::where('plate_number', $this->search_plate)->with('markings')->first();
            if ($vehicle && $vehicle->markings->isNotEmpty()) {
                $this->result = $vehicle->markings->last();
            } else {
                $this->error = "Immatriculation introuvable ou non marquée.";
            }
        } else {
            $this->error = "Veuillez entrer un code ou une immatriculation.";
        }
    }

    public function render()
    {
        return view('livewire.agent-verify-search');
    }
}