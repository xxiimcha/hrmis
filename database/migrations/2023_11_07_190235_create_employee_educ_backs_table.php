<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\EmployeeTable;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employee_educ_backs', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(EmployeeTable::class);
            $table->string('level')->nullable();
            $table->string('school_name')->nullable();
            $table->string('degree')->nullable();
            $table->string('fromAtt')->nullable();
            $table->string('toAtt')->nullable();
            $table->string('highLevel')->nullable();
            $table->string('yearGrad')->nullable();
            $table->string('scholarship')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_educ_backs');
    }
};
