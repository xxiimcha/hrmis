<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Department;

use App\Models\LeaveRequestTrack;

class LeaveRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'receiverHead'
    ];

    public function departmentInfo(): belongsTo
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function trackingInfo(): hasMany
    {
        return $this->hasMany(LeaveRequestTrack::class, 'leave_request_id')->orderBy('created_at', 'DESC');
    }

}
