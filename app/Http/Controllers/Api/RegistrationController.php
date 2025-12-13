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

class RegistrationController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        // Agents see their created registrations; admin sees all
        if ($user->hasRole('admin')) {
            $regs = Registration::latest()->paginate(20);
        } else {
            $regs = Registration::where('agent_id', $user->id)->latest()->paginate(20);
        }

        return response()->json($regs);
    }

    public function store(StoreRegistrationRequest $request, QrService $qr, PdfService $pdf)
    {
        $this->authorize('create', Registration::class);
        // Begin transaction
        \DB::beginTransaction();
        try {
            // Create or find owner
            $ownerData = $request->only(['owner_name','owner_phone','address','commune','piece_identity']);
            $owner = Owner::firstOrCreate(['phone' => $ownerData['owner_phone']], [
                'name' => $ownerData['owner_name'] ?? 'Unknown',
                'address' => $ownerData['address'] ?? null,
                'commune' => $ownerData['commune'] ?? null,
                'piece_identity' => $ownerData['piece_identity'] ?? null,
            ]);

            // Normalize plate
            $plate = strtoupper(preg_replace('/[^A-Z0-9]/', '', $request->plate_number ?? ''));

            // Create vehicle (or find by plate)
            $vehicle = Vehicle::firstOrCreate([
                'plate_number' => $plate
            ], [
                'vin' => $request->vin,
                'make' => $request->make,
                'model' => $request->model,
                'color' => $request->color,
                'mirror_engraving_code' => $request->mirror_engraving_code,
                'current_owner_id' => $owner->id,
            ]);

            // Create registration
            $registration = Registration::create([
                'registration_number' => $this->generateRegistrationNumber(),
                'vehicle_id' => $vehicle->id,
                'owner_id' => $owner->id,
                'agent_id' => $request->user()->id,
                'status' => 'PENDING',
            ]);

            // Update vehicle active registration and owner
            $vehicle->active_registration_id = $registration->id;
            $vehicle->current_owner_id = $owner->id;
            $vehicle->save();

            // Generate QR token and PDF (synchronous stub)
            $qrToken = $qr->generateToken($registration);
            $vehicle->qr_token = $qrToken;
            $vehicle->save();

            $pdfPath = $pdf->generateReceipt($registration);

            \DB::commit();

            return response()->json([
                'registration_number' => $registration->registration_number,
                'qr_token' => $qrToken,
                'pdf' => $pdfPath,
                'registration' => $registration
            ], 201);
        } catch (\Exception $e) {
            \DB::rollBack();
            return response()->json(['message' => 'Error creating registration', 'error' => $e->getMessage()], 500);
        }
    }

    public function show(Registration $registration)
    {
        $this->authorize('view', $registration);
        return response()->json($registration);
    }

    public function update(StoreRegistrationRequest $request, Registration $registration)
    {
        $this->authorize('update', $registration);
        $registration->update($request->only(['notes']));
        return response()->json($registration);
    }

    public function validateRegistration(Request $request, Registration $registration)
    {
        $this->authorize('validate', $registration);
        $user = $request->user();
        $registration->status = 'VALIDATED';
        $registration->validated_by = $user->id;
        $registration->validated_at = now();
        $registration->save();

        return response()->json(['message' => 'Registration validated', 'registration' => $registration]);
    }

    public function search(Request $request)
    {
        $q = $request->query('q');
        $plate = $request->query('plate');
        $engraving = $request->query('engraving');
        $token = $request->query('qr_token');

        $builder = Vehicle::query();
        if ($plate) $builder->where('plate_number', 'like', '%'.preg_replace('/[^A-Z0-9]/','',strtoupper($plate)).'%');
        if ($engraving) $builder->where('mirror_engraving_code', $engraving);
        if ($token) $builder->where('qr_token', $token);

        $vehicles = $builder->with('currentOwner','registrations')->limit(50)->get();
        return response()->json($vehicles);
    }

    public function verifyToken($token)
    {
        $vehicle = Vehicle::where('qr_token', $token)->with('currentOwner','registrations')->first();
        if (!$vehicle) {
            return response()->json(['message' => 'Token not found'], 404);
        }
        return response()->json(['vehicle' => $vehicle]);
    }

    protected function generateRegistrationNumber()
    {
        $prefix = 'BRNY-' . now()->format('Ym');
        $last = Registration::where('registration_number', 'like', $prefix . '%')->orderBy('id', 'desc')->first();
        if (!$last) {
            $n = 1;
        } else {
            $parts = explode('-', $last->registration_number);
            $n = intval(end($parts)) + 1;
        }

        return $prefix . '-' . str_pad($n, 4, '0', STR_PAD_LEFT);
    }
}
