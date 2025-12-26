<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VehicleBrand;
use App\Models\VehicleModel;
use Illuminate\Http\Request;

class ModelController extends Controller
{
    public function index(VehicleBrand $brand)
    {
        $models = $brand->models()->orderBy("name")->get();
        return view("admin.models.index", compact("brand", "models"));
    }

    public function store(Request $request, VehicleBrand $brand)
    {
        $request->validate([
            "name" => "required|string|max:255"
        ]);

        $brand->models()->create($request->only("name"));

        return redirect()->route("admin.brands.models.index", $brand)->with("success", "Modèle ajouté.");
    }

    public function update(Request $request, VehicleBrand $brand, VehicleModel $model)
    {
        $request->validate([
            "name" => "required|string|max:255"
        ]);

        $model->update($request->only("name"));

        return redirect()->route("admin.brands.models.index", $brand)->with("success", "Modèle mis à jour.");
    }

    public function destroy(VehicleBrand $brand, VehicleModel $model)
    {
        $model->delete();

        return redirect()->route("admin.brands.models.index", $brand)->with("success", "Modèle supprimé.");
    }
}

