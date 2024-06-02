<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\EmployeeTable;

class StepNotification extends Model
{
    use HasFactory;

    public function employeeTinfo(): belongsTo
    {
        return $this->belongsTo(EmployeeTable::class, 'employee_table_id');
    }
}
