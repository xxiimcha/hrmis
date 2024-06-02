<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
use App\Models\Department;

class Heads_personal_info extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'middlename',
        'lastname',
        'avatar',
        'department'
    ];

    public function departmentHeadDept(): belongsTo
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
}
