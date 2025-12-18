<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Disable foreign key checks to allow dropping tables
        Schema::disableForeignKeyConstraints();
        
        Schema::dropIfExists('audit_logs');
        Schema::dropIfExists('vehicle_photos');
        Schema::dropIfExists('theft_reports');
        Schema::dropIfExists('registrations');
        Schema::dropIfExists('vehicles');
        Schema::dropIfExists('owners');
        Schema::dropIfExists('vehicle_models');
        Schema::dropIfExists('vehicle_brands');
        
        Schema::enableForeignKeyConstraints();

        // 1. Catalogue
        Schema::create('vehicle_brands', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });

        Schema::create('vehicle_models', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id')->constrained('vehicle_brands')->onDelete('cascade');
            $table->string('name');
            $table->timestamps();
            $table->unique(['brand_id', 'name']);
        });

        // 2. Données Métier
        Schema::create('owners', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone')->index();
            $table->string('address')->nullable();
            $table->string('commune')->nullable();
            $table->string('quartier')->nullable();
            $table->timestamps();
        });

        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('plate_number')->unique();
            $table->foreignId('brand_id')->constrained('vehicle_brands');
            $table->foreignId('model_id')->constrained('vehicle_models');
            $table->smallInteger('manufacture_year')->index();
            $table->string('color')->nullable();
            $table->string('vin')->nullable();
            $table->string('mirror_engraving_code')->nullable()->index();
            $table->timestamps();
        });

        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string('registration_number')->unique();
            $table->foreignId('owner_id')->constrained('owners')->onDelete('cascade');
            $table->foreignId('vehicle_id')->constrained('vehicles')->onDelete('cascade');
            $table->enum('status', ['PENDING', 'ACTIVE', 'STOLEN'])->default('ACTIVE');
            $table->foreignId('created_by')->constrained('users');
            $table->foreignId('validated_by')->nullable()->constrained('users');
            $table->timestamp('validated_at')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });

        Schema::create('theft_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('registration_id')->constrained('registrations')->onDelete('cascade');
            $table->foreignId('reported_by')->nullable()->constrained('users');
            $table->dateTime('reported_at');
            $table->string('location')->nullable();
            $table->text('description')->nullable();
            $table->enum('status', ['OPEN', 'RESOLVED'])->default('OPEN');
            $table->timestamps();
        });

        Schema::create('vehicle_photos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('registration_id')->constrained('registrations')->onDelete('cascade');
            $table->enum('type', ['PLATE', 'MIRROR', 'FRONT', 'REAR', 'ID_DOC', 'REG_DOC']);
            $table->string('path');
            $table->timestamps();
        });

        Schema::create('audit_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('actor_user_id')->nullable()->constrained('users');
            $table->string('action');
            $table->string('entity_type');
            $table->unsignedBigInteger('entity_id');
            $table->json('meta')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('audit_logs');
        Schema::dropIfExists('vehicle_photos');
        Schema::dropIfExists('theft_reports');
        Schema::dropIfExists('registrations');
        Schema::dropIfExists('vehicles');
        Schema::dropIfExists('owners');
        Schema::dropIfExists('vehicle_models');
        Schema::dropIfExists('vehicle_brands');
        Schema::enableForeignKeyConstraints();
    }
};