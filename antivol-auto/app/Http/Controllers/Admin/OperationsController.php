<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminDashboardFilterRequest;
use App\Services\AdminDashboardService;
use App\Models\VehicleBrand;
use App\Models\Owner;
use App\Models\User;

class OperationsController extends Controller
{
    protected $service;

    public function __construct(AdminDashboardService $service)
    {
        $this->service = $service;
    }

    public function index(AdminDashboardFilterRequest $request)
    {
        $filters = $request->validated();
        
        if (empty($filters['from'])) $filters['from'] = now()->subDays(30)->format('Y-m-d');
        if (empty($filters['to'])) $filters['to'] = now()->format('Y-m-d');

        $registrations = $this->service->getRecentRegistrations($filters);
        $thefts = $this->service->getRecentThefts($filters);
        $duplicates = $this->service->getDuplicates();
        $agentPerformance = $this->service->getAgentPerformance($filters);

        // Data for filters
        $brands = VehicleBrand::orderBy('name')->get();
        $communes = Owner::distinct('commune')->whereNotNull('commune')->pluck('commune');
        $agents = User::where('role', 'agent')->orderBy('name')->get();

        return view('admin.operations', compact('registrations', 'thefts', 'duplicates', 'agentPerformance', 'filters', 'brands', 'communes', 'agents'));
    }
}
