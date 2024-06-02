<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Department;
use App\Models\EmployeeResAdd;
use App\Models\EmployeePerAdd;

class EmployeePersonalInformation extends Model
{
    use HasFactory;

    public function employeeDepartment(): belongsTo
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function employeeResAdd(): belongsTo
    {
        return $this->belongsTo(EmployeeResAdd::class, 'employee_res_add_id');
    }

    public function employeePerAdd(): belongsTo
    {
        return $this->belongsTo(EmployeePerAdd::class, 'employee_per_add_id');
    }
}
