<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Vehicle;
use App\Models\VehicleBrand;
use App\Models\VehicleModel;
use App\Models\TheftReport;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Spatie\Permission\Models\Role;

class TheftWorkflowTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        
        // Create roles if they don't exist (using firstOrCreate to avoid duplicates if seeded)
        Role::firstOrCreate(['name' => 'admin']);
        Role::firstOrCreate(['name' => 'agent']);
        Role::firstOrCreate(['name' => 'user']);
    }

    public function test_full_theft_workflow()
    {
        // 1. Setup Data
        $brand = VehicleBrand::create(['name' => 'Toyota']);
        $model = VehicleModel::create(['brand_id' => $brand->id, 'name' => 'Corolla']);
        
        $vehicle = Vehicle::create([
            'plate_number' => 'AA-123-BB',
            'brand_id' => $brand->id,
            'model_id' => $model->id,
            'manufacture_year' => 2020,
            'color' => 'Black',
            'vin' => '1234567890ABCDEFG'
        ]);

        $reporter = User::factory()->create();
        $admin = User::factory()->create();
        $admin->assignRole('admin');

        // 2. Client Reports Theft
        $response = $this->actingAs($reporter)
            ->post(route('thefts.store'), [
                'plate_number' => $vehicle->plate_number,
                'reported_at' => now()->toDateTimeString(),
                'location' => 'Douala',
                'description' => 'Stolen from parking lot'
            ]);

        $response->assertRedirect(route('dashboard'));
        $this->assertDatabaseHas('theft_reports', [
            'vehicle_id' => $vehicle->id,
            'status' => 'PENDING',
            'reported_by' => $reporter->id
        ]);

        $report = TheftReport::where('vehicle_id', $vehicle->id)->first();

        // 3. Admin Confirms Theft
        $response = $this->actingAs($admin)
            ->put(route('admin.thefts.update', $report), [
                'status' => 'CONFIRMED',
                'admin_note' => 'Verified with police'
            ]);

        $response->assertRedirect(route('admin.thefts.index'));
        $this->assertDatabaseHas('theft_reports', [
            'id' => $report->id,
            'status' => 'CONFIRMED'
        ]);

        // 4. Verify Search Logic (Simulating Agent Search)
        // We check if the vehicle is retrieved with the confirmed theft report
        $searchedVehicle = Vehicle::with(['theftReports' => function($q) {
                $q->where('status', 'CONFIRMED');
            }])
            ->where('plate_number', 'AA-123-BB')
            ->first();

        $this->assertNotNull($searchedVehicle);
        $this->assertTrue($searchedVehicle->theftReports->isNotEmpty());
        $this->assertEquals('CONFIRMED', $searchedVehicle->theftReports->first()->status);
    }
}