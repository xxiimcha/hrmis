<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employee_per_adds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('block')->nullable();
            $table->string('street')->nullable();
            $table->string('village')->nullable();
            $table->string('province')->nullable();
            $table->string('city')->nullable();
            $table->string('baranggay')->nullable();
            $table->string('zipcode')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_per_adds');
    }
};
