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
use Illuminate\Support\Facades\DB;

class TestDataSeeder extends Seeder
{
    public function run()
    {
        // Ensure we have agent and client users
        $agent = User::where('email', 'agent@example.com')->first();
        $clientUser = User::where('phone', '250000002')->first();

        if (!$agent || !$clientUser) {
            $this->command->info('Agent or client user not found; run UserSeeder first.');
            return;
        }

        // Create some owners
        $owner1 = Owner::create([
            'user_id' => $clientUser->id,
            'name' => 'Jean Mwiza',
            'phone' => '250123456',
            'address' => 'Av. de l\'Indépendance',
            'commune' => 'Gisenyi',
            'piece_identity' => 'ID123456',
        ]);

        $owner2 = Owner::create([
            'name' => 'Marie Uwase',
            'phone' => '250234567',
            'address' => 'Rue Principale',
            'commune' => 'Kigali',
        ]);

        // Vehicles
        $vehicle1 = Vehicle::create([
            'plate_number' => 'RAB 123 A',
            'vin' => 'VIN000111222',
            'make' => 'Toyota',
            'model' => 'Corolla',
            'color' => 'Blanc',
            'mirror_engraving_code' => 'ENGR-0001',
            'qr_token' => 'QR-' . bin2hex(random_bytes(8)),
            'current_owner_id' => $owner1->id,
            'status' => 'ACTIVE',
        ]);

        $vehicle2 = Vehicle::create([
            'plate_number' => 'RAB 999 Z',
            'vin' => 'VIN999888777',
            'make' => 'Honda',
            'model' => 'Civic',
            'color' => 'Noir',
            'mirror_engraving_code' => 'ENGR-0002',
            'qr_token' => 'QR-' . bin2hex(random_bytes(8)),
            'current_owner_id' => $owner2->id,
            'status' => 'ACTIVE',
        ]);

        // Registrations (dossiers)
        $reg1 = Registration::create([
            'registration_number' => $this->nextRegistrationNumber(),
            'vehicle_id' => $vehicle1->id,
            'owner_id' => $owner1->id,
            'agent_id' => $agent->id,
            'status' => 'VALIDATED',
            'validated_by' => $agent->id,
            'validated_at' => now(),
            'notes' => 'Enregistrement initial',
        ]);

        $reg2 = Registration::create([
            'registration_number' => $this->nextRegistrationNumber(),
            'vehicle_id' => $vehicle2->id,
            'owner_id' => $owner2->id,
            'agent_id' => $agent->id,
            'status' => 'PENDING',
            'notes' => 'Enregistrement en attente',
        ]);

        // Link active_registration_id on vehicle
        $vehicle1->active_registration_id = $reg1->id;
        $vehicle1->save();

        $vehicle2->active_registration_id = $reg2->id;
        $vehicle2->save();

        // Photos (paths are placeholders); in real use, upload files to storage
        VehiclePhoto::create([
            'registration_id' => $reg1->id,
            'vehicle_id' => $vehicle1->id,
            'type' => 'plate',
            'path' => 'test_images/vehicle1_plate.jpg',
            'thumb_path' => 'test_images/thumbs/vehicle1_plate.jpg',
            'uploaded_by' => $agent->id,
        ]);

        VehiclePhoto::create([
            'registration_id' => $reg1->id,
            'vehicle_id' => $vehicle1->id,
            'type' => 'mirror_engraving',
            'path' => 'test_images/vehicle1_mirror.jpg',
            'thumb_path' => 'test_images/thumbs/vehicle1_mirror.jpg',
            'uploaded_by' => $agent->id,
        ]);

        VehiclePhoto::create([
            'registration_id' => $reg2->id,
            'vehicle_id' => $vehicle2->id,
            'type' => 'plate',
            'path' => 'test_images/vehicle2_plate.jpg',
            'thumb_path' => 'test_images/thumbs/vehicle2_plate.jpg',
            'uploaded_by' => $agent->id,
        ]);

        // Theft report for vehicle2 (simulate a report)
        $theft = TheftReport::create([
            'vehicle_id' => $vehicle2->id,
            'reported_by_user_id' => $owner2->user_id ?? null,
            'registration_id' => $reg2->id,
            'report_date' => now(),
            'description' => 'Signalement test: véhicule volé la nuit.',
            'status' => 'OPEN',
            'police_reference' => null,
        ]);

        // Update vehicle status to STOLEN to reflect the report
        $vehicle2->status = 'STOLEN';
        $vehicle2->save();

        // Audit logs
        AuditLog::create([
            'user_id' => $agent->id,
            'action' => 'registration.created',
            'auditable_type' => Registration::class,
            'auditable_id' => $reg1->id,
            'before' => null,
            'after' => json_encode($reg1->toArray()),
            'ip_address' => '127.0.0.1',
            'meta' => json_encode(['note' => 'seed data registration']),
        ]);

        AuditLog::create([
            'user_id' => $agent->id,
            'action' => 'vehicle.status_changed',
            'auditable_type' => Vehicle::class,
            'auditable_id' => $vehicle2->id,
            'before' => json_encode(['status' => 'ACTIVE']),
            'after' => json_encode(['status' => 'STOLEN']),
            'ip_address' => '127.0.0.1',
            'meta' => json_encode(['reason' => 'test theft report']),
        ]);

        $this->command->info('Test data seeded: owners, vehicles, registrations, photos, theft report, audit logs.');
    }

    protected function nextRegistrationNumber()
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
