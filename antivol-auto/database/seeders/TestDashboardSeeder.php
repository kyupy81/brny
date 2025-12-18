<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Registration;
use App\Models\Owner;
use App\Models\Vehicle;
use App\Models\TheftReport;
use App\Models\User;
use App\Models\VehicleBrand;

class TestDashboardSeeder extends Seeder
{
    public function run()
    {
        // Ensure we have brands/models
        if (VehicleBrand::count() == 0) {
            $this->call(VehicleCatalogSeeder::class);
        }

        // Ensure we have agents
        if (User::where('role', 'agent')->count() == 0) {
            User::factory()->create(['role' => 'agent', 'name' => 'Agent 1']);
            User::factory()->create(['role' => 'agent', 'name' => 'Agent 2']);
        }

        // Create 30 Registrations
        for ($i = 0; $i < 30; $i++) {
            $owner = Owner::factory()->create();
            $vehicle = Vehicle::factory()->create();
            
            $registration = Registration::factory()->create([
                'owner_id' => $owner->id,
                'vehicle_id' => $vehicle->id,
            ]);

            // If stolen, create theft report
            if ($registration->status === 'STOLEN') {
                TheftReport::factory()->create([
                    'registration_id' => $registration->id,
                ]);
            }
        }
    }
}