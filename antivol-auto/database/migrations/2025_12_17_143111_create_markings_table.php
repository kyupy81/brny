<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('markings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_id')->constrained('vehicles')->onDelete('cascade');
            $table->string('code')->unique();
            $table->string('qr_path')->nullable();
            $table->string('marking_type')->default('STANDARD');
            $table->timestamp('marked_at')->nullable();
            $table->foreignId('agent_id')->nullable()->constrained('users');
            $table->string('zone')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('markings');
    }
};
