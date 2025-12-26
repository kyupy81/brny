<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminDashboardFilterRequest;
use App\Services\AdminDashboardService;
use App\Models\VehicleBrand;
use App\Models\Owner;
use App\Models\User;

class DashboardController extends Controller
{
    protected $service;

    public function __construct(AdminDashboardService $service)
    {
        $this->service = $service;
    }

    public function index(AdminDashboardFilterRequest $request)
    {
        $filters = $request->validated();
        
        // Default filters if not present
        if (empty($filters['from'])) {
            $filters['from'] = now()->subDays(30)->format('Y-m-d');
        }
        if (empty($filters['to'])) {
            $filters['to'] = now()->format('Y-m-d');
        }

        $kpis = $this->service->getKPIs($filters);
        $charts = $this->service->getCharts($filters);

        // Data for filters
        $brands = VehicleBrand::orderBy('name')->get();
        $communes = Owner::distinct('commune')->whereNotNull('commune')->pluck('commune');
        $agents = User::where('role', 'agent')->orderBy('name')->get();

        return view('admin.dashboard', compact('kpis', 'charts', 'filters', 'brands', 'communes', 'agents'));
    }
}
