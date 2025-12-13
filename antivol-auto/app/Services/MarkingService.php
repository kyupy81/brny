<?php

namespace App\Services;

use App\Models\Marking;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MarkingService
{
    public function generateCode(): string
    {
         = date('Y');
         = Marking::whereYear('created_at', )->latest()->first();
        
         = 1;
        if () {
            // Extract sequence from AVA-YYYY-XXXXXX
             = explode('-', ->code);
            if (count() === 3) {
                 = intval([2]) + 1;
            }
        }

        return sprintf('AVA-%s-%06d', , );
    }

    public function generateQrCode(string , string ): string
    {
        // Content to encode
         = json_encode([
            'code' => ,
            'plate' => ,
            'url' => route('verify.public', ['token' => base64_encode()]) // Example URL
        ]);

         = 'qrcodes/' .  . '.png';
        
        // Generate QR Code
         = QrCode::format('png')
                       ->size(300)
                       ->errorCorrection('H')
                       ->generate();

        Storage::disk('public')->put(, );

        return ;
    }
}
