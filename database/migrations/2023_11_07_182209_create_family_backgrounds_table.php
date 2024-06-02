<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\EmployeeTable;
use App\Models\SpouseInfo;
use App\Models\FatherInfo;
use App\Models\MotherInfo;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('family_backgrounds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignIdFor(EmployeeTable::class);
            $table->foreignIdFor(SpouseInfo::class);
            $table->foreignIdFor(FatherInfo::class);
            $table->foreignIdFor(MotherInfo::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('family_backgrounds');
    }
};
