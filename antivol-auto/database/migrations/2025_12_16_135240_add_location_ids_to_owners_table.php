<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('owners', function (Blueprint $table) {
            $table->foreignId('city_id')->nullable()->after('address')->constrained()->nullOnDelete();
            $table->foreignId('commune_id')->nullable()->after('city_id')->constrained()->nullOnDelete();
            $table->foreignId('quarter_id')->nullable()->after('commune_id')->constrained()->nullOnDelete();
            
            $table->index('city_id');
            $table->index('commune_id');
            $table->index('quarter_id');
        });
    }

    public function down(): void
    {
        Schema::table('owners', function (Blueprint $table) {
            $table->dropForeign(['city_id']);
            $table->dropForeign(['commune_id']);
            $table->dropForeign(['quarter_id']);
            $table->dropColumn(['city_id', 'commune_id', 'quarter_id']);
        });
    }
};
