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
        Schema::create('leave_cards', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(EmployeeTable::class);
            $table->string('periodFrom');
            $table->string('periodTo');
            $table->string('particulars');

            $table->string('vacEarned');
            $table->string('vacAbsUnd');
            $table->string('vacBal');
            $table->string('vacWP');
            $table->string('vacTotal');

            $table->string('sickEarned');
            $table->string('sickAbsUnd');
            $table->string('sickBal');
            $table->string('sickWP');
            $table->string('sickTotal');

            $table->string('dateAction');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leave_cards');
    }
};
