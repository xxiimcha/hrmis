<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\EmployeePerAdd;
use App\Models\EmployeeResAdd;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employee_personal_information', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('firstname');
            $table->string('middlename');
            $table->string('lastname');
            $table->string('extension');
            $table->string('birthday');
            $table->string('birthPlace');
            $table->string('sex');
            $table->string('civilStatus');
            $table->string('height');
            $table->string('weight');
            $table->string('bloodType');

            $table->string('gsis');
            $table->string('pagibig');
            $table->string('philhealth');
            $table->string('sss');
            $table->string('tin');
            $table->string('employee_number');

            $table->string('citizenship');
            $table->string('telephone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email');
            $table->foreignIdFor(EmployeePerAdd::class);
            $table->foreignIdFor(EmployeeResAdd::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_personal_information');
    }
};
