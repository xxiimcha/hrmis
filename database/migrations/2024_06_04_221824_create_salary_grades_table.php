<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('salary_grades', function (Blueprint $table) {
            $table->id();
            $table->decimal('step_1', 10, 2)->nullable();
            $table->decimal('step_2', 10, 2)->nullable();
            $table->decimal('step_3', 10, 2)->nullable();
            $table->decimal('step_4', 10, 2)->nullable();
            $table->decimal('step_5', 10, 2)->nullable();
            $table->decimal('step_6', 10, 2)->nullable();
            $table->decimal('step_7', 10, 2)->nullable();
            $table->decimal('step_8', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salary_grades');
    }
};
