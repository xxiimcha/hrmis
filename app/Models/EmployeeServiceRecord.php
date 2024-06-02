<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;

class EmployeeServiceRecord extends Model
{
    use HasFactory;

    public function employeesrdep(): belongsTo
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
}
