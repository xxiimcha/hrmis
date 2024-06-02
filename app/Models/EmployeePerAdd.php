<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\PhilippineBarangay;
use App\Models\PhilippineProvince;
use App\Models\PhilippineCity;

class EmployeePerAdd extends Model
{
    use HasFactory;

    public function brgy(): belongsTo
    {
        return $this->belongsTo(PhilippineBarangay::class, 'baranggay', 'barangay_code');
    }

    public function cityCon(): belongsTo
    {
        return $this->belongsTo(PhilippineCity::class, 'city', 'city_municipality_code');
    }

    public function provinceCon(): belongsTo
    {
        return $this->belongsTo(PhilippineProvince::class, 'province', 'province_code');
    }
}
