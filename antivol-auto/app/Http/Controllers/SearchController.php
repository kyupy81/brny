<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Marking;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        $results = collect();

        if ($query) {
            // Search by Marking Code
            $marking = Marking::where('code', $query)->with('vehicle.brand', 'vehicle.model')->first();
            if ($marking) {
                $results->push($marking->vehicle);
            }

            // Search by VIN or Plate Number
            $vehicles = Vehicle::where('vin', 'like', "%{$query}%")
                ->orWhere('plate_number', 'like', "%{$query}%")
                ->with(['brand', 'model', 'marking'])
                ->get();
            
            $results = $results->merge($vehicles)->unique('id');
        }

        return view('search.results', compact('results', 'query'));
    }
}

