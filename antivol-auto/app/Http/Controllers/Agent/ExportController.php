<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Http\Requests\AgentDashboardFilterRequest;
use App\Services\AgentDashboardService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class ExportController extends Controller
{
    protected $service;

    public function __construct(AgentDashboardService $service)
    {
        $this->service = $service;
    }

    public function export(AgentDashboardFilterRequest $request)
    {
        $filters = $request->validated();
        $userId = Auth::id();

        // We can't use getLatestRegistrations because it paginates.
        // We need a new method in service or build query here.
        // For simplicity, I'll build query here using the service's filter logic if possible, 
        // but applyFilters is protected. 
        // I'll just replicate the query logic here for now to ensure it works.
        
        $query = \App\Models\Registration::with(['owner', 'vehicle.brand', 'vehicle.model']);
        $query->where('created_by', $userId);

        if (!empty($filters['from'])) $query->whereDate('created_at', '>=', $filters['from']);
        if (!empty($filters['to'])) $query->whereDate('created_at', '<=', $filters['to']);
        if (!empty($filters['status']) && $filters['status'] !== 'ALL') $query->where('status', $filters['status']);
        // Add other filters if needed...

        $registrations = $query->get();

        $filename = 'registrations_' . date('Y-m-d_H-i') . '.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        $callback = function() use ($registrations) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['Date', 'Registration #', 'Plaque', 'Marque', 'Modele', 'Annee', 'Proprietaire', 'Telephone', 'Commune', 'Statut']);

            foreach ($registrations as $reg) {
                fputcsv($file, [
                    $reg->created_at->format('Y-m-d H:i'),
                    $reg->registration_number,
                    $reg->vehicle->plate_number ?? '',
                    $reg->vehicle->brand->name ?? '',
                    $reg->vehicle->model->name ?? '',
                    $reg->vehicle->manufacture_year ?? '',
                    $reg->owner->name ?? '',
                    $reg->owner->phone ?? '',
                    $reg->owner->commune ?? '',
                    $reg->status
                ]);
            }
            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }
}
