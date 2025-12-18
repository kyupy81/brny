<?php

namespace App\Http\Controllers;

use App\Models\TheftReport;
use App\Models\Registration;
use Illuminate\Http\Request;

class TheftController extends Controller
{
    public function index()
    {
        $thefts = TheftReport::with(['registration.vehicle.brand', 'registration.vehicle.model'])
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

        $registration = Registration::whereHas('vehicle', function ($query) use ($validated) {
            $query->where('plate_number', $validated['plate_number']);
        })->first();

        if (!$registration) {
            return back()->withErrors(['plate_number' => 'Véhicule non trouvé.']);
        }

        TheftReport::create([
            'registration_id' => $registration->id,
            'reported_at' => $validated['reported_at'],
            'location' => $validated['location'],
            'description' => $validated['description'],
            'status' => 'OPEN',
        ]);

        return redirect()->route('thefts.index')->with('success', 'Vol signalé.');
    }
}