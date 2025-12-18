<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use App\Models\Owner;
use App\Models\Vehicle;
use App\Models\VehicleBrand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RegistrationController extends Controller
{
    public function create()
    {
        $brands = VehicleBrand::orderBy('name')->get();
        return view('registrations.create', compact('brands'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string|max:255',
            'brand_id' => 'required|exists:vehicle_brands,id',
            'model_id' => 'required|exists:vehicle_models,id',
            'manufacture_year' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'plate_number' => 'required|string|unique:vehicles,plate_number',
            'color' => 'nullable|string|max:50',
        ]);

        DB::transaction(function () use ($validated) {
            $owner = Owner::create([
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
                'phone' => $validated['phone'],
                'address' => $validated['address'] ?? null,
            ]);

            $vehicle = Vehicle::create([
                'plate_number' => $validated['plate_number'],
                'brand_id' => $validated['brand_id'],
                'model_id' => $validated['model_id'],
                'manufacture_year' => $validated['manufacture_year'],
                'color' => $validated['color'] ?? null,
            ]);

            Registration::create([
                'registration_number' => 'REG-' . strtoupper(Str::random(10)),
                'owner_id' => $owner->id,
                'vehicle_id' => $vehicle->id,
                'status' => 'PENDING',
                'created_by' => 1, // Hardcoded for now, should be auth()->id()
            ]);
        });

        return redirect()->route('home')->with('success', 'Enregistrement effectué avec succès.');
    }
}