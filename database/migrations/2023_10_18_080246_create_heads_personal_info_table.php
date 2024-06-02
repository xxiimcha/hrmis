<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\Department;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('heads_personal_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->string('firstname');
            $table->string('middlename');
            $table->string('lastname');
            $table->string('avatar');
            $table->foreignIdFor(Department::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('heads_personal_info');
    }
};
