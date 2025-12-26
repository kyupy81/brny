<?php

namespace App\Http\Controllers;

use App\Models\TheftReport;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TheftController extends Controller
{
    public function index()
    {
        $thefts = TheftReport::with(['vehicle.brand', 'vehicle.model'])
            ->where('status', 'OPEN')
            ->latest()
            ->get();
            
        return view('thefts.index', compact('thefts'));
    }

    public function create()
    {
        return view('thefts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'plate_number' => 'required|exists:vehicles,plate_number',
            'description' => 'required|string',
            'location' => 'required|string',
            'reported_at' => 'required|date',
        ]);

        $vehicle = Vehicle::where('plate_number', $validated['plate_number'])->first();

        if (!$vehicle) {
            return back()->withErrors(['plate_number' => 'Véhicule non trouvé.']);
        }

        TheftReport::create([
            'vehicle_id' => $vehicle->id,
            'reported_at' => $validated['reported_at'],
            'location' => $validated['location'],
            'description' => $validated['description'],
            'status' => 'PENDING',
            'reported_by' => Auth::id(),
        ]);

        return redirect()->route('dashboard')->with('success', 'Vol signalé.');
    }
}
