<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Http\Requests\AgentDashboardFilterRequest;
use App\Services\AgentDashboardService;
use App\Http\Controllers\VehicleCatalogController;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Registration;

class RegistrationListController extends Controller
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

        $registrations = $this->service->getLatestRegistrations($userId, $filters);
        // Get catalog data for filters
        $catalogController = new VehicleCatalogController();
        $brands = $catalogController->getBrands();
        $cities = \App\Models\City::where("is_active", true)->orderBy("name")->get();

        return view("agent.registrations.index", compact("registrations", "filters", "brands", "cities"));
    }

    public function downloadPdf(Registration $registration)
    {
        // Ensure the agent owns this registration
        if ($registration->created_by !== Auth::id()) {
            abort(403);
        }

        $registration->load(["owner.city", "owner.communeRel", "vehicle.brand", "vehicle.model"]);
        
        $pdf = Pdf::loadView("agent.registrations.pdf", compact("registration"));
        
        return $pdf->download("recu-enregistrement-{$registration->registration_number}.pdf");
    }
}

