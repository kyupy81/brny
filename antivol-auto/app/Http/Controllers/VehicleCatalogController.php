<?php

namespace App\Http\Controllers;

use App\Models\VehicleBrand;
use App\Models\VehicleModel;
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
}