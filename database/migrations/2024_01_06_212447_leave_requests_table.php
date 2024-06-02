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
        Schema::create('leave_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignIdFor(EmployeeTable::class);
            $table->foreignIdFor(Department::class);
            $table->string('dateoffiling');
            $table->string('position');
            $table->string('salary');

            $table->string('disapprovedMessage');

            // store as array ex. [ 1, 2, 3 ]
            $table->string('typeofleave6A');
            $table->string('othersOf6A');

            $table->string('detailsOfLeave6B');
            $table->string('detailsOfLeave6BReason');

            $table->string('numberOfWorkingDays6C');
            $table->string('inclusiveDates6C');

            $table->string('commutation6D');

            $table->string('recommendation7B');
            $table->string('recommendation7BReason');

            $table->string('dayswpay');
            $table->string('dayswopay');
            $table->string('others');
            $table->string('status')->default('Pending');
            $table->string('receiverHead')->default(4);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leave_requests');
    }
};