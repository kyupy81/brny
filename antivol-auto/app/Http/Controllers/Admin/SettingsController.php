<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VehicleBrand;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $brands = VehicleBrand::withCount("models")->get();
        
        return view("admin.settings", compact("brands"));
    }
}
