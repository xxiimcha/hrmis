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
        Schema::create('employee_voluntaries', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(EmployeeTable::class);
            $table->string('organization')->nullable();
            $table->string('incFrom')->nullable();
            $table->string('incTo')->nullable();
            $table->string('noHours')->nullable();
            $table->string('position')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_voluntaries');
    }
};
