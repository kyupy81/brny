<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function generateCertificate(Vehicle $vehicle)
    {
        // Ensure vehicle has marking and owner
        $vehicle->load(['marking', 'owner', 'brand', 'model']);

        if (!$vehicle->marking) {
            return back()->with('error', 'Ce véhicule n\'a pas encore de marquage.');
        }

        $pdf = Pdf::loadView('documents.certificate', compact('vehicle'));
        
        // Setup paper size and orientation
        $pdf->setPaper('a4', 'landscape');

        return $pdf->stream('Certificat-BRNY-' . $vehicle->plate_number . '.pdf');
    }
}