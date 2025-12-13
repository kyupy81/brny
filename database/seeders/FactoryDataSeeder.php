<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Owner;
use App\Models\Vehicle;
use App\Models\Registration;
use App\Models\VehiclePhoto;
use App\Models\TheftReport;
use App\Models\AuditLog;
use App\Models\User;

class FactoryDataSeeder extends Seeder
{
    public function run()
    {
        $this->command->info('Creating bulk test data via factories...');

        // Ensure at least one agent exists
        $agent = User::where('email', 'agent@example.com')->first() ?? User::factory()->create();

        // Create owners
        $owners = Owner::factory()->count(30)->create();

        // Create vehicles and assign owners randomly
        $vehicles = collect();
        for ($i = 0; $i < 50; $i++) {
            $owner = $owners->random();
            $vehicle = Vehicle::factory()->create([
                'current_owner_id' => $owner->id,
            ]);
            $vehicles->push($vehicle);
        }

        // Create registrations for each vehicle
        $registrations = collect();
        foreach ($vehicles as $v) {
            $owner = $owners->random();
            $reg = Registration::factory()->create([
                'vehicle_id' => $v->id,
                'owner_id' => $owner->id,
                'agent_id' => $agent->id,
                'status' => 'VALIDATED',
                'validated_by' => $agent->id,
                'validated_at' => now(),
            ]);
            $v->active_registration_id = $reg->id;
            $v->current_owner_id = $owner->id;
            $v->save();
            $registrations->push($reg);
        }

        // Add photos for each registration
        foreach ($registrations as $reg) {
            VehiclePhoto::factory()->count(2)->create([
                'registration_id' => $reg->id,
                'vehicle_id' => $reg->vehicle_id,
                'uploaded_by' => $agent->id,
            ]);
        }

        // Create a few theft reports randomly
        $theftVehicles = $vehicles->random(5);
        foreach ($theftVehicles as $tv) {
            $tr = TheftReport::factory()->create([
                'vehicle_id' => $tv->id,
                'reported_by_user_id' => null,
                'registration_id' => $tv->active_registration_id,
                'status' => 'OPEN',
            ]);

            $tv->status = 'STOLEN';
            $tv->save();

            AuditLog::factory()->create([
                'user_id' => $agent->id,
                'action' => 'vehicle.status_changed',
                'auditable_type' => Vehicle::class,
                'auditable_id' => $tv->id,
                'before' => json_encode(['status' => 'ACTIVE']),
                'after' => json_encode(['status' => 'STOLEN']),
            ]);
        }

        // Some audit logs for registrations
        foreach ($registrations->random(10) as $r) {
            AuditLog::factory()->create([
                'user_id' => $agent->id,
                'action' => 'registration.created',
                'auditable_type' => Registration::class,
                'auditable_id' => $r->id,
                'after' => json_encode($r->toArray()),
            ]);
        }

        $this->command->info('Bulk factory data created: ' . $owners->count() . ' owners, ' . $vehicles->count() . ' vehicles, ' . $registrations->count() . ' registrations.');
    }
}
