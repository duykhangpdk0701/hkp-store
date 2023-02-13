<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SysWard extends Model
{
    use HasFactory;

    public function cities()
    {
        return $this->belongsTo(SysCity::class, 'city_id', 'id');
    }

    public function districts()
    {
        return $this->belongsTo(SysDistrict::class, 'district_id', 'id');
    }
}
