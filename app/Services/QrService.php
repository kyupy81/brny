<?php

namespace App\Services;

use App\Models\Registration;
use Illuminate\Support\Str;

class QrService
{
    public function generateToken(Registration $registration): string
    {
        $token = 'QR-' . Str::upper(Str::random(16));
        // In production, ensure uniqueness
        $registration->vehicle->qr_token = $token;
        return $token;
    }

    public function generateQrImagePath(string $token): string
    {
        // placeholder; integration with QR lib recommended
        return '/qr/' . $token . '.png';
    }
}
