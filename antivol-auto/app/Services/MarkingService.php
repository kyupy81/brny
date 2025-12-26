<?php

namespace App\Services;

use App\Models\Marking;
use App\Models\Vehicle;
use App\Models\User;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MarkingService
{
    public function generateCode(): string
    {
        $year = date('Y');
        $lastMarking = Marking::whereYear('created_at', $year)->latest()->first();
        
        $sequence = 1;
        if ($lastMarking) {
            // Extract sequence from AVA-YYYY-XXXXXX
            $parts = explode('-', $lastMarking->code);
            if (count($parts) === 3) {
                $sequence = intval($parts[2]) + 1;
            }
        }

        return sprintf('AVA-%s-%06d', $year, $sequence);
    }

    public function generateQrCode(string $code, string $plate): string
    {
        // Content to encode
        $content = json_encode([
            'code' => $code,
            'plate' => $plate,
            'url' => route('verify.public', ['token' => base64_encode($code)]) // Example URL
        ]);

        $path = 'qrcodes/' . $code . '.png';
        
        // Generate QR Code
        $image = QrCode::format('png')
                       ->size(300)
                       ->errorCorrection('H')
                       ->generate($content);

        Storage::disk('public')->put($path, $image);

        return $path;
    }

    public function generateMarking(Vehicle $vehicle, User $agent): Marking
    {
        $code = $this->generateCode();
        $qrPath = $this->generateQrCode($code, $vehicle->plate_number);

        $marking = Marking::create([
            'vehicle_id' => $vehicle->id,
            'code' => $code,
            'qr_path' => $qrPath,
            'marking_type' => 'standard', // Default type
            'marked_at' => now(),
            'agent_id' => $agent->id,
            'zone' => 'Abidjan', // Default or dynamic
        ]);

        return $marking;
    }
}
