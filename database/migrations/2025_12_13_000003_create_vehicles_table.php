<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('plate_number', 32)->nullable()->index();
            $table->string('vin', 64)->nullable();
            $table->string('make', 100)->nullable();
            $table->string('model', 100)->nullable();
            $table->string('color', 50)->nullable();
            $table->string('mirror_engraving_code', 64)->nullable()->index();
            $table->string('qr_token', 128)->nullable()->unique();
            $table->unsignedBigInteger('current_owner_id')->nullable();
            $table->unsignedBigInteger('active_registration_id')->nullable();
            $table->enum('status', ['ACTIVE','STOLEN','SUSPENDED'])->default('ACTIVE');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('current_owner_id')->references('id')->on('owners')->onDelete('set null');
            $table->foreign('active_registration_id')->references('id')->on('registrations')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
};
