<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SysCity extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'name', 'slug', 'geometry', 'center', 'color', 'bounding_box', 'pre', 'order', 'status'];

    /**
     * Relationship with Shipping fees
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shoppingFees()
    {
        return $this->hasMany(ShippingFee::class, 'city_id', 'id');
    }

    public function districts()
    {
        return $this->hasMany(SysDistrict::class, 'city_id', 'id');
    }

    public function wards()
    {
        return $this->hasMany(SysWard::class, 'district_id', 'id');
    }
}
