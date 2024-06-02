<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\SpouseInfo;
use App\Models\FatherInfo;
use App\Models\MotherInfo;
use App\Models\EmployeeChildren;

class FamilyBackground extends Model
{
    use HasFactory;

    public function employeeSpouseInfo(): belongsTo
    {
        return $this->belongsTo(SpouseInfo::class, 'spouse_info_id');
    }

    public function employeeFatherInfo(): belongsTo
    {
        return $this->belongsTo(FatherInfo::class, 'father_info_id');
    }

    public function employeeMotherInfo(): belongsTo
    {
        return $this->belongsTo(MotherInfo::class, 'mother_info_id');
    }

    public function employeeChildren(): hasMany
    {
        return $this->hasMany(EmployeeChildren::class, 'family_background_id');
    }
}
