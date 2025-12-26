<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class DocumentController extends Controller
{
    public function generateCertificate(Vehicle $vehicle)
    {
        // Ensure the vehicle has a marking
        if (!$vehicle->marking) {
            abort(404, "Marking not found for this vehicle.");
        }

        $data = [
            "vehicle" => $vehicle,
            "owner" => $vehicle->owner,
            "marking" => $vehicle->marking,
            "agent" => $vehicle->agent,
            "date" => now()->format("d/m/Y"),
        ];

        $pdf = Pdf::loadView("documents.certificate", $data);

        return $pdf->download("certificat-marquage-" . $vehicle->license_plate . ".pdf");
    }
}
