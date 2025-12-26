<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VehicleBrand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = VehicleBrand::withCount("models")->orderBy("name")->get();
        return view("admin.brands.index", compact("brands"));
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|string|max:255|unique:vehicle_brands,name"
        ]);

        VehicleBrand::create($request->only("name"));

        return redirect()->route("admin.brands.index")->with("success", "Marque ajoutée avec succès.");
    }

    public function update(Request $request, VehicleBrand $brand)
    {
        $request->validate([
            "name" => "required|string|max:255|unique:vehicle_brands,name," . $brand->id
        ]);

        $brand->update($request->only("name"));

        return redirect()->route("admin.brands.index")->with("success", "Marque mise à jour.");
    }

    public function destroy(VehicleBrand $brand)
    {
        if ($brand->models()->count() > 0) {
            return back()->with("error", "Impossible de supprimer cette marque car elle contient des modèles.");
        }

        $brand->delete();

        return redirect()->route("admin.brands.index")->with("success", "Marque supprimée.");
    }
}

