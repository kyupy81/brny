<?php

namespace App\Services;

use App\Models\Registration;

class PdfService
{
    public function generateReceipt(Registration $registration): string
    {
        // placeholder: integrate barryvdh/laravel-dompdf or snappy for real PDF generation
        $path = 'receipts/' . $registration->registration_number . '.pdf';
        // In demo mode just return path; background job should generate file
        return $path;
    }
}
