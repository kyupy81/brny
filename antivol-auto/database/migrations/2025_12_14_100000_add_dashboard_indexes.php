<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('owners', function (Blueprint $table) {
            $table->index('commune');
        });

        Schema::table('registrations', function (Blueprint $table) {
            $table->index('status');
            $table->index('created_at');
        });

        Schema::table('theft_reports', function (Blueprint $table) {
            $table->index('reported_at');
        });
    }

    public function down()
    {
        Schema::table('owners', function (Blueprint $table) {
            $table->dropIndex(['commune']);
        });

        Schema::table('registrations', function (Blueprint $table) {
            $table->dropIndex(['status']);
            $table->dropIndex(['created_at']);
        });

        Schema::table('theft_reports', function (Blueprint $table) {
            $table->dropIndex(['reported_at']);
        });
    }
};