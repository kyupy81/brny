<?php

namespace App\Http\Controllers;

use App\Http\Requests\DashboardFilterRequest;
use App\Services\DashboardService;
use App\Models\VehicleBrand;
use App\Models\Owner;
use App\Models\User;

class AdminDashboardController extends Controller
{
    protected $dashboardService;

    public function __construct(DashboardService $dashboardService)
    {
        $this->dashboardService = $dashboardService;
    }

    public function index(DashboardFilterRequest $request)
    {
        $filters = $request->validated();
        
        // No userId passed means global scope (Admin view)
        $kpis = $this->dashboardService->getKpis($filters);
        $statsByCommune = $this->dashboardService->getStatsByCommune($filters);
        $statsByBrand = $this->dashboardService->getStatsByBrand($filters);
        $statsByModel = $this->dashboardService->getStatsByModel($filters);
        $timeSeries = $this->dashboardService->getTimeSeries($filters);
        $agentPerformance = $this->dashboardService->getAgentPerformance($filters);

        // Data for filters
        $brands = VehicleBrand::orderBy('name')->get();
        $communes = Owner::distinct()->orderBy('commune')->pluck('commune');
        $agents = User::where('role', 'agent')->orderBy('name')->get();

        return view('admin.dashboard.index', compact(
            'kpis', 
            'statsByCommune', 
            'statsByBrand', 
            'statsByModel', 
            'timeSeries', 
            'agentPerformance',
            'brands', 
            'communes',
            'agents',
            'filters'
        ));
    }
}