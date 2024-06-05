<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UpdateLeaveBalances extends Command
{
    protected $signature = 'leaves:update';
    protected $description = 'Update leave balances for employees';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $serviceRecords = DB::table('employee_service_records')->get();
        $currentDate = Carbon::now();

        foreach ($serviceRecords as $record) {
            $fromDate = Carbon::parse($record->fromDate);

            // Check if the current date is the same day of the month as the fromDate
            if ($currentDate->day === $fromDate->day) {
                DB::table('employee_tables')
                    ->where('id', $record->employee_table_id)
                    ->update([
                        'vacationLeave' => DB::raw('vacationLeave + 1.25'),
                        'sickLeave' => DB::raw('sickLeave + 1.25')
                    ]);

                // Update the fromDate to the same day of the next month
                $newFromDate = $fromDate->addMonth();

                DB::table('employee_service_records')
                    ->where('id', $record->id)
                    ->update(['fromDate' => $newFromDate->toDateString()]);
            }
        }

        $this->info('Leave balances have been updated.');
    }
}
