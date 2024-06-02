<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

use App\Models\{
    EmployeePersonalInformation,
    EmployeeServiceRecord,
    LeaveCard,
    Department,
    LeaveRequest,
    FamilyBackground,
    EmployeeEducBack,
    EmployeeCivilService,
    EmployeeWorkExp,
    EmployeeVoluntary,
    EmployeeLearning,
    EmployeeHobby,
    EmployeeOtherSkill,
    EmployeeMembership,
    EmployeeReference,
    EmployeeIssuedId
};

class EmployeeTable extends Model
{
    use HasFactory;

    protected $fillable = [
        'leaveCredits'
    ];

    public function employeeInfo(): belongsTo
    {
        return $this->belongsTo(EmployeePersonalInformation::class, 'employee_personal_information_id');
    }

    public function employeeServiceRecord(): hasMany
    {
        return $this->hasMany(EmployeeServiceRecord::class, 'employee_table_id');
    }

    public function employeeLeaveCard(): hasMany
    {
        return $this->hasMany(LeaveCard::class, 'employee_table_id');
    }

    public function leaveRequest(): hasMany
    {
        return $this->hasMany(LeaveRequest::class, 'employee_table_id');
    }

    public function employeeDepartment(): belongsTo
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function employeeFamilyBackground(): hasOne
    {
        return $this->hasOne(FamilyBackground::class, 'employee_table_id');
    }

    public function employeeEducation(): hasMany
    {
        return $this->hasMany(EmployeeEducBack::class, 'employee_table_id');
    }

    public function employeeCS(): hasMany
    {
        return $this->hasMany(EmployeeCivilService::class, 'employee_table_id');
    }

    public function employeeWE(): hasMany
    {
        return $this->hasMany(EmployeeWorkExp::class, 'employee_table_id');
    }

    public function employeeVol(): hasMany
    {
        return $this->hasMany(EmployeeVoluntary::class, 'employee_table_id');
    }

    public function employeeLearning(): hasMany
    {
        return $this->hasMany(EmployeeLearning::class, 'employee_table_id');
    }

    public function employeeRecog(): hasMany
    {
        return $this->hasMany(EmployeeOtherSkill::class, 'employee_table_id');
    }

    public function employeeHobby(): hasMany
    {
        return $this->hasMany(EmployeeHobby::class, 'employee_table_id');
    }

    public function employeeMembership(): hasMany
    {
        return $this->hasMany(EmployeeMembership::class, 'employee_table_id');
    }

    public function employeeReference(): hasMany
    {
        return $this->hasMany(EmployeeReference::class, 'employee_table_id');
    }

    public function employeeIssuedId(): belongsTo
    {
        return $this->belongsTo(EmployeeIssuedId::class, 'employee_issued_id_id');
    }
}
