<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\EmployeePersonalInformation;
use App\Models\User;
use App\Models\Department;
use App\Models\EmployeeIssuedId;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employee_tables', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->nullable();
            $table->foreignIdFor(EmployeePersonalInformation::class);
            $table->integer('leaveCredits')->default(10);
            $table->foreignIdFor(Department::class);
            $table->foreignIdFor(EmployeeIssuedId::class);
            $table->string('position');
            $table->string('current_salary');
            $table->string('current_salary_mode');
            $table->string('entered_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_tables');
    }
};
