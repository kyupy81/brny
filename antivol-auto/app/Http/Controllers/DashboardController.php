<?php

namespace App\Http\Controllers;

use App\Http\Requests\DashboardFilterRequest;
use App\Services\DashboardService;
use App\Models\VehicleBrand;
use App\Models\Owner;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    protected $dashboardService;

    public function __construct(DashboardService $dashboardService)
    {
        $this->dashboardService = $dashboardService;
    }

    public function index(DashboardFilterRequest $request)
    {
        $filters = $request->validated();
        $userId = Auth::id();

        $kpis = $this->dashboardService->getKpis($filters, $userId);
        $statsByCommune = $this->dashboardService->getStatsByCommune($filters, $userId);
        $statsByBrand = $this->dashboardService->getStatsByBrand($filters, $userId);
        $statsByModel = $this->dashboardService->getStatsByModel($filters, $userId);
        $timeSeries = $this->dashboardService->getTimeSeries($filters, $userId);

        // Data for filters
        $brands = VehicleBrand::orderBy('name')->get();
        $communes = Owner::distinct()->orderBy('commune')->pluck('commune');

        return view('dashboard.index', compact(
            'kpis', 
            'statsByCommune', 
            'statsByBrand', 
            'statsByModel', 
            'timeSeries', 
            'brands', 
            'communes',
            'filters'
        ));
    }
}