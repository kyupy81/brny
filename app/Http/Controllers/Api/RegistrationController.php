<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRegistrationRequest;
use App\Models\Owner;
use App\Models\Vehicle;
use App\Models\Registration;
use App\Services\QrService;
use App\Services\PdfService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;  // Ajout de l'import

class RegistrationController extends Controller
{
    // ... reste du code inchangé, mais remplacez \DB:: par DB::
    public function store(StoreRegistrationRequest $request, QrService $qr, PdfService $pdf)
    {
        // ...
        DB::beginTransaction();  // Utilisez DB:: au lieu de \DB::
        // ...
        DB::commit();
        // ...
    }
}