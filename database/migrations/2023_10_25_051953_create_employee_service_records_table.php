<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\EmployeeTable;
use App\Models\Department;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employee_service_records', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(EmployeeTable::class);
            $table->string('fromDate')->nullable();
            $table->string('toDate')->nullable();
            $table->string('designation')->nullable();
            $table->string('status')->nullable();
            $table->string('salary')->nullable();
            $table->string('mode')->nullable();
            $table->foreignIdFor(Department::class);
            $table->string('branch')->nullable();
            $table->string('leaves')->nullable();
            $table->string('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_service_records');
    }
};
