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
        Schema::create('employee_issued_ids', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('issuedId')->nullable();
            $table->string('licenseNo')->nullable();
            $table->string('issuancePlace')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_issued_ids');
    }
};
