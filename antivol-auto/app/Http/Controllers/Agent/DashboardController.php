<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Http\Requests\AgentDashboardFilterRequest;
use App\Services\AgentDashboardService;
use App\Http\Controllers\VehicleCatalogController;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    protected $service;

    public function __construct(AgentDashboardService $service)
    {
        $this->service = $service;
    }

    public function index(AgentDashboardFilterRequest $request)
    {
        $filters = $request->validated();
        $userId = Auth::id();

        $stats = $this->service->getKPIs($userId, $filters);
        $chartData = $this->service->getCharts($userId, $filters);
        $incompleteRegistrations = $this->service->getIncompleteRegistrations($userId);
        $latestRegistrations = $this->service->getLatestRegistrations($userId, $filters, 5);

        // Format chart data for Chart.js
        $charts = [
            "registrations_by_month" => [
                "labels" => $chartData["registrations_trend"]->pluck("date"),
                "data" => $chartData["registrations_trend"]->pluck("total"),
            ],
            "vehicles_by_status" => [
                "labels" => $chartData["status_distribution"]->pluck("status"),
                "data" => $chartData["status_distribution"]->pluck("total"),
            ],
        ];

        // Get catalog data for filters
        $catalogController = new VehicleCatalogController();
        $brands = $catalogController->getBrands();
        $cities = \App\Models\City::where("is_active", true)->orderBy("name")->get();

        return view("agent.dashboard", compact("stats", "charts", "incompleteRegistrations", "latestRegistrations", "filters", "brands", "cities"));
    }
}

