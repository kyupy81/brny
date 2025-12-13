<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('theft_reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('vehicle_id');
            $table->unsignedBigInteger('reported_by_user_id')->nullable();
            $table->unsignedBigInteger('registration_id')->nullable();
            $table->timestamp('report_date')->useCurrent();
            $table->text('description')->nullable();
            $table->enum('status', ['OPEN','INVESTIGATING','CLOSED'])->default('OPEN');
            $table->string('police_reference')->nullable();
            $table->timestamps();

            $table->foreign('vehicle_id')->references('id')->on('vehicles')->onDelete('cascade');
            $table->foreign('reported_by_user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('registration_id')->references('id')->on('registrations')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('theft_reports');
    }
};
