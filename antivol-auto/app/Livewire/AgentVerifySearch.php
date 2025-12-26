<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Vehicle;
use App\Models\Marking;
use Illuminate\Support\Facades\Auth;

class AgentVerifySearch extends Component
{
    public $search = '';
    public $results = [];
    public $recentFiles = [];

    public function mount()
    {
        // Load recent files (vehicles created by this agent or just recent ones?)
        // For now, let's show recent vehicles added to the system or recent searches.
        // The prompt says "5 derniers dossiers", implying cases handled.
        // Assuming "dossiers" means Vehicles or TheftReports. Let's assume Vehicles for now.
        $this->recentFiles = Vehicle::with(['owner', 'brand', 'model'])
            ->latest()
            ->take(5)
            ->get();
    }

    public function updatedSearch()
    {
        if (strlen($this->search) < 2) {
            $this->results = [];
            return;
        }
        
        $this->verify();
    }

    public function verify()
    {
        if (empty($this->search)) {
            $this->results = [];
            return;
        }

        $searchTerm = '%' . $this->search . '%';

        $this->results = Vehicle::with(['owner', 'brand', 'model', 'marking', 'theftReports'])
            ->where('plate_number', 'like', $searchTerm)
            ->orWhereHas('marking', function($q) use ($searchTerm) {
                $q->where('code', 'like', $searchTerm);
            })
            ->orWhereHas('owner', function($q) use ($searchTerm) {
                $q->where('name', 'like', $searchTerm)
                  ->orWhere('phone', 'like', $searchTerm);
            })
            ->take(10)
            ->get();
    }

    public function render()
    {
        return view('livewire.agent-verify-search');
    }
}
