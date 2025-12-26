<?php

namespace App\Http\Controllers;

use App\Models\VehicleBrand;
use App\Models\VehicleModel;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleCatalogController extends Controller
{
    public function getBrands()
    {
        return response()->json(VehicleBrand::orderBy('name')->get());
    }

    public function getModels($brandId)
    {
        return response()->json(VehicleModel::where('brand_id', $brandId)->orderBy('name')->get());
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $results = collect();

        if ($query) {
            $results = Vehicle::with(['brand', 'model'])
                ->where('plate_number', 'like', "%{$query}%")
                ->orWhere('vin', 'like', "%{$query}%")
                ->orWhere('mirror_engraving_code', 'like', "%{$query}%")
                ->get();
        }

        return view('search.results', compact('results', 'query'));
    }
}
