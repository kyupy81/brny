<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UploadPhotoRequest;
use App\Models\Registration;
use App\Models\VehiclePhoto;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function upload(UploadPhotoRequest $request, Registration $registration)
    {
        $this->authorize('update', $registration);
        $files = $request->file('photos');
        $created = [];
        foreach ($files as $file) {
            $type = $request->input('type') ?? 'other';
            $path = $file->store('public/vehicle_photos');
            $publicPath = Storage::url($path);

            $photo = VehiclePhoto::create([
                'registration_id' => $registration->id,
                'vehicle_id' => $registration->vehicle_id,
                'type' => $type,
                'path' => $publicPath,
                'uploaded_by' => $request->user()->id,
            ]);

            $created[] = $photo;
        }

        return response()->json(['photos' => $created], 201);
    }
}
