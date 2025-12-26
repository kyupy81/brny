<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SearchTest extends TestCase
{
    use RefreshDatabase;

    public function test_search_page_is_displayed()
    {
        $response = $this->get('/search');

        $response->assertStatus(200);
    }

    public function test_search_results_displayed()
    {
        // Create a vehicle with a specific plate number
        $vehicle = \App\Models\Vehicle::factory()->create([
            'plate_number' => 'UNIQUEVIN123',
            'mirror_engraving_code' => 'UNIQUEVIN123',
        ]);
        
        // Create brand and model manually if factory doesn't do it or to be sure
        $brand = \App\Models\VehicleBrand::factory()->create(['name' => 'Toyota']);
        $model = \App\Models\VehicleModel::factory()->create(['name' => 'Corolla', 'brand_id' => $brand->id]);
        
        $vehicle->brand_id = $brand->id;
        $vehicle->model_id = $model->id;
        $vehicle->save();

        $response = $this->get('/search?query=UNIQUEVIN123');

        $response->assertStatus(200);
        $response->assertSee('Toyota Corolla');
        $response->assertSee('UNIQUEVIN123');
    }

    public function test_search_no_results()
    {
        $response = $this->get('/search?query=NONEXISTENT');

        $response->assertStatus(200);
        $response->assertSee('Aucun');
    }
}
