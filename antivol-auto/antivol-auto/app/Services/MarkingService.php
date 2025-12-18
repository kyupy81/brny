<?php

namespace App\Services;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class MarkingService
{
    public function generateCode()
    {
        return 'AV-' . strtoupper(Str::random(8));
    }

    public function generateQrCode($code, $plate)
    {
        $content = json_encode(['code' => $code, 'plate' => $plate, 'url' => route('verify', ['code' => $code])]);
        $qr = QrCode::format('png')->size(300)->generate($content);
        
        $fileName = 'qrcodes/' . $code . '.png';
        Storage::disk('public')->put($fileName, $qr);
        
        return $fileName;
    }
}