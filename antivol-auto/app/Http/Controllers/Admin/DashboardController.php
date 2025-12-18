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
    protected \;

    public function __construct(AdminDashboardService \)
    {
        \->service = \;
    }

    public function index(AdminDashboardFilterRequest \)
    {
        \ = \->validated();
        
        // Default filters if not present
        if (empty(\['from'])) {
            \['from'] = now()->subDays(30)->format('Y-m-d');
        }
        if (empty(\['to'])) {
            \['to'] = now()->format('Y-m-d');
        }

        \ = \->service->getKPIs(\);
        \ = \->service->getCharts(\);

        // Data for filters
        \ = VehicleBrand::orderBy('name')->get();
        \ = Owner::distinct('commune')->whereNotNull('commune')->pluck('commune');
        \ = User::where('role', 'agent')->orderBy('name')->get();

        return view('admin.dashboard', compact('kpis', 'charts', 'filters', 'brands', 'communes', 'agents'));
    }
}

