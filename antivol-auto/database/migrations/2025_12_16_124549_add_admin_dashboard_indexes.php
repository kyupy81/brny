<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table("registrations", function (Blueprint $table) {
            // $table->index("created_by");
        });

        Schema::table("vehicles", function (Blueprint $table) {
            // $table->index("brand_id");
            // $table->index("model_id");
            // $table->index("manufacture_year");
        });

        Schema::table("users", function (Blueprint $table) {
            // $table->index("role");
        });
    }

    public function down()
    {
        Schema::table("registrations", function (Blueprint $table) {
            // $table->dropIndex(["created_by"]);
        });

        Schema::table("vehicles", function (Blueprint $table) {
            // $table->dropIndex(["brand_id"]);
            // $table->dropIndex(["model_id"]);
            // $table->dropIndex(["manufacture_year"]);
        });

        Schema::table("users", function (Blueprint $table) {
            // $table->dropIndex(["role"]);
        });
    }
};
