<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Vehicle;
use App\Models\VehicleBrand;
use App\Models\VehicleModel;
use App\Models\Owner;
use App\Models\Registration;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Spatie\Permission\Models\Role;

class DocumentTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        Role::firstOrCreate(["name" => "agent"]);
    }

    public function test_agent_can_download_certificate()
    {
        // 1. Setup Data
        $agent = User::factory()->create();
        $agent->assignRole("agent");

        $brand = VehicleBrand::create(["name" => "Toyota"]);
        $model = VehicleModel::create(["brand_id" => $brand->id, "name" => "Corolla"]);
        
        $vehicle = Vehicle::create([
            "plate_number" => "CERT-TEST-01",
            "brand_id" => $brand->id,
            "model_id" => $model->id,
            "manufacture_year" => 2022,
            "color" => "Blue",
            "vin" => "VIN123456789",
            "mirror_engraving_code" => "AVA-2025-000001"
        ]);

        // Create Owner
        $owner = Owner::create([
            "first_name" => "John",
            "last_name" => "Doe",
            "email" => "john@example.com",
            "phone" => "1234567890",
            "address" => "123 Main St",
            "city" => "New York",
            "identity_card_number" => "ID12345"
        ]);

        // Create Registration
        $registration = Registration::create([
            "vehicle_id" => $vehicle->id,
            "owner_id" => $owner->id,
            "registration_number" => "REG-001",
            "status" => "ACTIVE",
            "created_by" => $agent->id,
        ]);

        // 2. Request PDF
        $response = $this->actingAs($agent)
            ->get(route("agent.registrations.pdf", $registration));

        // 3. Assertions
        $response->assertStatus(200);
        $response->assertHeader("content-type", "application/pdf");
    }
}
