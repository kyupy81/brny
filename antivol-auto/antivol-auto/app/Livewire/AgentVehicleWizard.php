<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User;
use App\Models\Client;
use App\Models\Vehicle;
use App\Models\Marking;
use App\Models\Document;
use App\Services\MarkingService;
use App\Services\AuditService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AgentVehicleWizard extends Component
{
    use WithFileUploads;

    public $step = 1;

    // Step 1: Client
    public $client_name;
    public $client_phone;
    public $client_address;
    public $client_id_type = 'CNI';
    public $client_id_number;

    // Step 2: Vehicle
    public $plate_number;
    public $make;
    public $model;
    public $color;
    public $type = 'Berline';
    public $year;
    public $vin;

    // Step 3: Uploads
    public $photo_vehicle;
    public $photo_mirror;
    public $photo_id;

    // Step 4: Result
    public $generated_code;
    public $qr_path;

    protected $rules = [
        1 => [
            'client_name' => 'required|string|min:3',
            'client_phone' => 'required|string', // Check uniqueness if needed
            'client_address' => 'required|string',
            'client_id_type' => 'required',
            'client_id_number' => 'required',
        ],
        2 => [
            'plate_number' => 'required|unique:vehicles,plate_number',
            'make' => 'required',
            'model' => 'required',
            'color' => 'required',
            'type' => 'required',
        ],
        3 => [
            'photo_vehicle' => 'required|image|max:2048',
            'photo_mirror' => 'required|image|max:2048',
            'photo_id' => 'required|image|max:2048',
        ],
    ];

    public function nextStep()
    {
        $this->validate($this->rules[$this->step]);
        $this->step++;
    }

    public function prevStep()
    {
        $this->step--;
    }

    public function submit(MarkingService $markingService)
    {
        $this->validate($this->rules[3]);

        DB::transaction(function () use ($markingService) {
            // 1. Create User/Client
            // Check if user exists by phone, else create
            $user = User::firstOrCreate(
                ['phone' => $this->client_phone],
                [
                    'name' => $this->client_name,
                    'email' => null, // Optional
                    'password' => Hash::make('password'), // Default password
                    'role' => 'client',
                    'status' => 'active'
                ]
            );

            $client = Client::firstOrCreate(
                ['user_id' => $user->id],
                [
                    'address' => $this->client_address,
                    'id_type' => $this->client_id_type,
                    'id_number' => $this->client_id_number
                ]
            );

            // 2. Create Vehicle
            $vehicle = Vehicle::create([
                'client_id' => $client->id,
                'plate_number' => $this->plate_number,
                'make' => $this->make,
                'model' => $this->model,
                'color' => $this->color,
                'type' => $this->type,
                'year' => $this->year,
                'vin' => $this->vin,
                'status' => 'registered'
            ]);

            // 3. Generate Marking
            $code = $markingService->generateCode();
            $qrPath = $markingService->generateQrCode($code, $this->plate_number);

            Marking::create([
                'vehicle_id' => $vehicle->id,
                'code' => $code,
                'qr_path' => $qrPath,
                'marking_type' => 'sticker', // Default or select
                'marked_at' => now(),
                'agent_id' => Auth::id(),
                'zone' => Auth::user()->agent->zone ?? 'Unknown'
            ]);

            // 4. Upload Documents
            $this->saveDocument($vehicle->id, 'photo_vehicle', $this->photo_vehicle);
            $this->saveDocument($vehicle->id, 'photo_mirror', $this->photo_mirror);
            $this->saveDocument($vehicle->id, 'id_card', $this->photo_id);

            // 5. Audit Log
            AuditService::log('register_vehicle', 'Vehicle', $vehicle->id, [
                'plate' => $this->plate_number,
                'code' => $code
            ]);

            $this->generated_code = $code;
            $this->qr_path = $qrPath;
            $this->step = 4;
        });
    }

    private function saveDocument($vehicleId, $type, $file)
    {
        $path = $file->store('documents', 'public');
        Document::create([
            'vehicle_id' => $vehicleId,
            'doc_type' => $type,
            'file_path' => $path,
            'uploaded_by' => Auth::id()
        ]);
    }

    public function render()
    {
        return view('livewire.agent-vehicle-wizard');
    }
}