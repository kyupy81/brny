<?php

namespace Tests\Feature;

use App\Models\Registration;
use App\Models\TheftReport;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\VehicleBrand;
use App\Models\VehicleModel;
use App\Models\Owner;
use App\Services\AdminDashboardService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminDashboardServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_kpis()
    {
        // Create data
        $user = User::factory()->create();
        $brand = VehicleBrand::factory()->create(['name' => 'Toyota']);
        $model = VehicleModel::factory()->create(['name' => 'Corolla', 'brand_id' => $brand->id]);
        
        $vehicle = Vehicle::factory()->create([
            'brand_id' => $brand->id,
            'model_id' => $model->id,
        ]);

        $owner = Owner::factory()->create(['commune' => 'Paris']);

        $registration = Registration::factory()->create([
            'vehicle_id' => $vehicle->id,
            'owner_id' => $owner->id,
            'created_by' => $user->id,
        ]);

        $theft = TheftReport::factory()->create([
            'vehicle_id' => $vehicle->id,
            'location' => 'Paris',
            'description' => 'Stolen',
            'status' => 'CONFIRMED'
        ]);

        $service = new AdminDashboardService();
        $kpis = $service->getKPIs([]);

        $this->assertEquals(1, $kpis['total_registrations']);
        $this->assertEquals(1, $kpis['total_thefts']);
        // Recovery rate is 0 because status is CONFIRMED, not RESOLVED
        $this->assertEquals(0, $kpis['recovery_rate']);
        $this->assertEquals(1, $kpis['active_agents']);
    }

    public function test_get_recent_thefts()
    {
        $service = new AdminDashboardService();
        $thefts = $service->getRecentThefts([]);
        $this->assertIsIterable($thefts);
    }
}
