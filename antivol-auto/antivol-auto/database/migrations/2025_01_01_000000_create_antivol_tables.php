<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Users (Modified default)
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->string('phone')->unique()->nullable();
            $table->string('password');
            $table->enum('role', ['admin', 'agent', 'client'])->default('client');
            $table->enum('status', ['active', 'suspended'])->default('active');
            $table->timestamp('last_login_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        // Password Reset Tokens
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        // Sessions
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });

        // Clients
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('address')->nullable();
            $table->string('id_type'); // CNI, Passport, Permis
            $table->string('id_number');
            $table->timestamps();
        });

        // Agents
        Schema::create('agents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('matricule')->unique()->nullable(); // Made nullable or generate it
            $table->string('zone')->nullable();
            $table->timestamps();
        });

        // Vehicles
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained()->onDelete('cascade');
            $table->string('plate_number')->unique();
            $table->string('make');
            $table->string('model');
            $table->string('color');
            $table->string('type'); // Berline, SUV, Moto...
            $table->year('year')->nullable();
            $table->string('vin')->nullable();
            $table->enum('status', ['registered', 'stolen', 'sold'])->default('registered');
            $table->timestamps();
        });

        // Markings
        Schema::create('markings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_id')->constrained()->onDelete('cascade');
            $table->string('code')->unique(); // AVA-YYYY-000001
            $table->string('qr_path')->nullable();
            $table->enum('marking_type', ['gravure', 'sticker']);
            $table->timestamp('marked_at');
            $table->foreignId('agent_id')->constrained('users'); // User ID of the agent
            $table->string('zone')->nullable();
            $table->timestamps();
        });

        // Documents
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_id')->constrained()->onDelete('cascade');
            $table->string('doc_type'); // photo_vehicle, photo_mirror, id_card
            $table->string('file_path');
            $table->foreignId('uploaded_by')->constrained('users');
            $table->timestamps();
        });

        // Correction Tickets
        Schema::create('correction_tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained();
            $table->foreignId('vehicle_id')->constrained();
            $table->text('message');
            $table->enum('status', ['open', 'resolved', 'closed'])->default('open');
            $table->timestamps();
        });

        // Audit Logs
        Schema::create('audit_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->string('action'); // create, update, view, verify
            $table->string('model_type')->nullable(); // Vehicle, Client...
            $table->unsignedBigInteger('model_id')->nullable();
            $table->json('details')->nullable();
            $table->string('ip_address')->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('users');
    }
};
