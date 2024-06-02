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
        Schema::create('employee_learnings', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(EmployeeTable::class);
            $table->string('learningTitle')->nullable();
            $table->string('atFrom')->nullable();
            $table->string('atTo')->nullable();
            $table->string('noHours')->nullable();
            $table->string('ld')->nullable();
            $table->string('conducted')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_learnings');
    }
};
