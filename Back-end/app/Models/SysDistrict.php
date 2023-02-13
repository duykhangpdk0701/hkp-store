<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SysDistrict extends Model
{
    use HasFactory;

    public function city()
    {
        return $this->belongsTo(SysCity::class, 'city_id', 'id');
    }

    public function wards()
    {
        return $this->hasMany(SysWard::class, 'district_id', 'id');
    }
}
