<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UploadPhotoRequest;
use App\Models\Registration;
use App\Models\VehiclePhoto;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class PhotoController extends Controller
{
    public function upload(UploadPhotoRequest $request, Registration $registration)
    {
        $this->authorize('update', $registration);
        
        $files = $request->file('photos');
        $created = [];
        $maxSize = 5120; // 5MB en KB

        foreach ($files as $file) {
            // ✅ Vérification stricte du type MIME
            $mimeType = $file->getMimeType();
            $allowedMimes = ['image/jpeg', 'image/png', 'image/jpg'];
            
            if (!in_array($mimeType, $allowedMimes)) {
                Log::warning('Invalid file MIME type', [
                    'file' => $file->getClientOriginalName(),
                    'mime' => $mimeType
                ]);
                continue;
            }

            // Vérifier la taille
            if ($file->getSize() > $maxSize * 1024) {
                Log::warning('File too large', [
                    'file' => $file->getClientOriginalName(),
                    'size' => $file->getSize()
                ]);
                continue;
            }

            // Stocker le fichier
            $path = $file->store('vehicle_photos', 'public');
            $publicPath = Storage::url($path);

            $type = $request->input('type') ?? 'other';

            $photo = VehiclePhoto::create([
                'registration_id' => $registration->id,
                'vehicle_id' => $registration->vehicle_id,
                'type' => $type,
                'path' => $publicPath,
                'file_size' => $file->getSize(),
                'mime_type' => $mimeType,
                'uploaded_by' => $request->user()->id,
            ]);

            $created[] = $photo;

            Log::info('Photo uploaded', [
                'registration_id' => $registration->id,
                'user_id' => $request->user()->id,
                'file' => $path
            ]);
        }

        if (empty($created)) {
            return response()->json([
                'message' => 'No valid photos to upload'
            ], 422);
        }

        return response()->json(['photos' => $created, 'count' => count($created)], 201);
    }
}