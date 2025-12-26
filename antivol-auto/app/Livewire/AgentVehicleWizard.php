<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Owner;
use App\Models\Vehicle;
use App\Models\Registration;
use App\Models\VehiclePhoto;
use App\Models\VehicleBrand;
use App\Models\VehicleModel;
use App\Services\MarkingService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AgentVehicleWizard extends Component
{
    use WithFileUploads;

    public $step = 1;

    // Step 1: Owner (Client)
    public $first_name;
    public $last_name;
    public $phone;
    public $address;
    public $commune;
    public $quartier;

    // Step 2: Vehicle
    public $plate_number;
    public $brand_id;
    public $model_id;
    public $manufacture_year;
    public $color;
    public $vin; // Chassis number

    // Step 3: Uploads
    public $photo_plate;
    public $photo_engraving;

    // Step 4: Result
    public $success = false;
    public $newVehicleId;
    public $markingCode;

    // Data Sources
    public $brands = [];
    public $models = [];

    protected $rules = [
        1 => [
            'first_name' => 'required|min:2',
            'last_name' => 'required|min:2',
            'phone' => 'required|regex:/^0[157][0-9]{8}$/',
            'commune' => 'required',
        ],
        2 => [
            'plate_number' => 'required|regex:/^[0-9]{4}[A-Z]{2}[0-9]{2}$/',
            'brand_id' => 'required|exists:vehicle_brands,id',
            'model_id' => 'required|exists:vehicle_models,id',
            'manufacture_year' => 'required|integer|min:1900|max:2025',
            'color' => 'required',
        ],
        3 => [
            'photo_plate' => 'required|image|max:5120', // 5MB
            'photo_engraving' => 'required|image|max:5120',
        ]
    ];

    public function mount()
    {
        $this->brands = VehicleBrand::orderBy('name')->get();
    }

    public function updatedBrandId($value)
    {
        $this->models = VehicleModel::where('brand_id', $value)->orderBy('name')->get();
        $this->model_id = null;
    }

    public function nextStep()
    {
        $this->validate($this->rules[$this->step]);
        $this->step++;
    }

    public function previousStep()
    {
        $this->step--;
    }

    public function submit(MarkingService $markingService)
    {
        $this->validate($this->rules[3]);

        DB::transaction(function () use ($markingService) {
            // 1. Create Owner
            $owner = Owner::firstOrCreate(
                ['phone' => $this->phone],
                [
                    'first_name' => $this->first_name,
                    'last_name' => $this->last_name,
                    'address' => $this->address,
                    'commune' => $this->commune,
                    'quartier' => $this->quartier,
                ]
            );

            // 2. Create Vehicle
            $vehicle = Vehicle::create([
                'plate_number' => strtoupper($this->plate_number),
                'brand_id' => $this->brand_id,
                'model_id' => $this->model_id,
                'manufacture_year' => $this->manufacture_year,
                'color' => $this->color,
                'vin' => $this->vin,
            ]);

            // 3. Create Registration
            $registration = Registration::create([
                'registration_number' => 'REG-' . strtoupper(Str::random(8)),
                'owner_id' => $owner->id,
                'vehicle_id' => $vehicle->id,
                'status' => 'ACTIVE',
                'created_by' => Auth::id(),
                'validated_by' => Auth::id(), // Auto-validate for agents? Or null? Assuming auto for now.
                'validated_at' => now(),
            ]);

            // 4. Handle Uploads & Create Photos
            $platePath = $this->photo_plate->store('registrations/plates', 'public');
            $engravingPath = $this->photo_engraving->store('registrations/engravings', 'public');

            VehiclePhoto::create([
                'registration_id' => $registration->id,
                'type' => 'PLATE',
                'path' => $platePath
            ]);

            VehiclePhoto::create([
                'registration_id' => $registration->id,
                'type' => 'MIRROR', // Assuming engraving is mirror
                'path' => $engravingPath
            ]);

            // 5. Create Marking
            $marking = $markingService->generateMarking($vehicle, Auth::user());
            
            $this->newVehicleId = $vehicle->id;
            $this->markingCode = $marking->code;
            $this->success = true;
            $this->step = 4;
        });
    }

    public function render()
    {
        return view('livewire.agent-vehicle-wizard');
    }
}
