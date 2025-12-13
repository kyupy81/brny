<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Users (Modified default)
        Schema::create('users', function (Blueprint ) {
            ->id();
            ->string('name');
            ->string('email')->unique()->nullable();
            ->string('phone')->unique()->nullable();
            ->string('password');
            ->enum('role', ['admin', 'agent', 'client'])->default('client');
            ->enum('status', ['active', 'suspended'])->default('active');
            ->timestamp('last_login_at')->nullable();
            ->rememberToken();
            ->timestamps();
        });

        // Clients
        Schema::create('clients', function (Blueprint ) {
            ->id();
            ->foreignId('user_id')->constrained()->onDelete('cascade');
            ->string('address')->nullable();
            ->string('id_type'); // CNI, Passport, Permis
            ->string('id_number');
            ->timestamps();
        });

        // Agents
        Schema::create('agents', function (Blueprint ) {
            ->id();
            ->foreignId('user_id')->constrained()->onDelete('cascade');
            ->string('matricule')->unique();
            ->string('zone')->nullable();
            ->timestamps();
        });

        // Vehicles
        Schema::create('vehicles', function (Blueprint ) {
            ->id();
            ->foreignId('client_id')->constrained()->onDelete('cascade');
            ->string('plate_number')->unique();
            ->string('make');
            ->string('model');
            ->string('color');
            ->string('type'); // Berline, SUV, Moto...
            ->year('year')->nullable();
            ->string('vin')->nullable();
            ->enum('status', ['registered', 'stolen', 'sold'])->default('registered');
            ->timestamps();
        });

        // Markings
        Schema::create('markings', function (Blueprint ) {
            ->id();
            ->foreignId('vehicle_id')->constrained()->onDelete('cascade');
            ->string('code')->unique(); // AVA-YYYY-000001
            ->string('qr_path')->nullable();
            ->enum('marking_type', ['gravure', 'sticker']);
            ->timestamp('marked_at');
            ->foreignId('agent_id')->constrained('users'); // User ID of the agent
            ->string('zone')->nullable();
            ->timestamps();
        });

        // Documents
        Schema::create('documents', function (Blueprint ) {
            ->id();
            ->foreignId('vehicle_id')->constrained()->onDelete('cascade');
            ->string('doc_type'); // photo_vehicle, photo_mirror, id_card
            ->string('file_path');
            ->foreignId('uploaded_by')->constrained('users');
            ->timestamps();
        });

        // Correction Tickets
        Schema::create('correction_tickets', function (Blueprint ) {
            ->id();
            ->foreignId('client_id')->constrained();
            ->foreignId('vehicle_id')->constrained();
            ->text('message');
            ->enum('status', ['open', 'resolved', 'closed'])->default('open');
            ->timestamps();
        });

        // Audit Logs
        Schema::create('audit_logs', function (Blueprint ) {
            ->id();
            ->foreignId('user_id')->nullable()->constrained();
            ->string('action'); // create, update, view, verify
            ->string('entity')->nullable(); // Vehicle, Client...
            ->unsignedBigInteger('entity_id')->nullable();
            ->json('meta_json')->nullable();
            ->string('ip')->nullable();
            ->string('user_agent')->nullable();
            ->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('audit_logs');
        Schema::dropIfExists('correction_tickets');
        Schema::dropIfExists('documents');
        Schema::dropIfExists('markings');
        Schema::dropIfExists('vehicles');
        Schema::dropIfExists('agents');
        Schema::dropIfExists('clients');
        Schema::dropIfExists('users');
    }
};
