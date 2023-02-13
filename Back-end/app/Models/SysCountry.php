<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SysCountry extends Model
{
    use HasFactory;

    use HasFactory;

    protected $fillable = ['name', 'code'];

    /**
     * Relationship with Shipping fee
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shippingFees()
    {
        return $this->hasMany(ShippingFee::class, 'country_id', 'id');
    }
}
