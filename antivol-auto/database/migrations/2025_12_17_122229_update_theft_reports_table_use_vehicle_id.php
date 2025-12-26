<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('theft_reports', function (Blueprint $table) {
            if (Schema::hasColumn('theft_reports', 'registration_id')) {
                $table->dropForeign(['registration_id']); // Drop foreign key if exists
                $table->dropColumn('registration_id');
            }
            
            if (!Schema::hasColumn('theft_reports', 'vehicle_id')) {
                $table->foreignId('vehicle_id')->after('id')->constrained('vehicles')->onDelete('cascade');
            }
            
            // Add status column if not exists or modify it
            if (!Schema::hasColumn('theft_reports', 'status')) {
                $table->string('status')->default('PENDING'); // PENDING, CONFIRMED, REJECTED, RECOVERED
            }
        });
    }

    public function down(): void
    {
        Schema::table('theft_reports', function (Blueprint $table) {
            $table->dropForeign(['vehicle_id']);
            $table->dropColumn('vehicle_id');
            // Reverting registration_id is hard without data
        });
    }
};
