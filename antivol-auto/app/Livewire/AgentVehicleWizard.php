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

    public  = 1;

    // Step 1: Client
    public ;
    public ;
    public ;
    public  = 'CNI';
    public ;

    // Step 2: Vehicle
    public ;
    public ;
    public ;
    public ;
    public  = 'Berline';
    public ;
    public ;

    // Step 3: Uploads
    public ;
    public ;
    public ;

    // Step 4: Result
    public ;
    public ;

    protected  = [
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
        ->validate(->rules[->step]);
        ->step++;
    }

    public function prevStep()
    {
        ->step--;
    }

    public function submit(MarkingService )
    {
        ->validate(->rules[3]);

        DB::transaction(function () use () {
            // 1. Create User/Client
            // Check if user exists by phone, else create
             = User::firstOrCreate(
                ['phone' => ->client_phone],
                [
                    'name' => ->client_name,
                    'email' => null, // Optional
                    'password' => Hash::make('password'), // Default password
                    'role' => 'client',
                    'status' => 'active'
                ]
            );

             = Client::firstOrCreate(
                ['user_id' => ->id],
                [
                    'address' => ->client_address,
                    'id_type' => ->client_id_type,
                    'id_number' => ->client_id_number
                ]
            );

            // 2. Create Vehicle
             = Vehicle::create([
                'client_id' => ->id,
                'plate_number' => ->plate_number,
                'make' => ->make,
                'model' => ->model,
                'color' => ->color,
                'type' => ->type,
                'year' => ->year,
                'vin' => ->vin,
                'status' => 'registered'
            ]);

            // 3. Generate Marking
             = ->generateCode();
             = ->generateQrCode(, ->plate_number);

            Marking::create([
                'vehicle_id' => ->id,
                'code' => ,
                'qr_path' => ,
                'marking_type' => 'sticker', // Default or select
                'marked_at' => now(),
                'agent_id' => Auth::id(),
                'zone' => Auth::user()->agent->zone ?? 'Unknown'
            ]);

            // 4. Upload Documents
            ->saveDocument(->id, 'photo_vehicle', ->photo_vehicle);
            ->saveDocument(->id, 'photo_mirror', ->photo_mirror);
            ->saveDocument(->id, 'id_card', ->photo_id);

            // 5. Audit Log
            AuditService::log('register_vehicle', 'Vehicle', ->id, [
                'plate' => ->plate_number,
                'code' => 
            ]);

            ->generated_code = ;
            ->qr_path = ;
            ->step = 4;
        });
    }

    private function saveDocument(, , )
    {
         = ->store('documents', 'public');
        Document::create([
            'vehicle_id' => ,
            'doc_type' => ,
            'file_path' => ,
            'uploaded_by' => Auth::id()
        ]);
    }

    public function render()
    {
        return view('livewire.agent-vehicle-wizard');
    }
}
