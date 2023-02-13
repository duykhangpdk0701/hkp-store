<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Location;

class Address extends Model
{
    use HasFactory, Location;

    const STATUS_ADDRESS_APPLIED = 1;

    protected $fillable = [
        'user_id',
        'name',
        'country_id',
        'city_id',
        'district_id',
        'ward_id',
        'address',
        'status'
    ];

    /**
     * Address default profile
     */
    public function scopeActive($query)
    {
        return $this->where('status', STATUS_ADDRESS_APPLIED);
    }

    /**
     * Get shipping address
     * @return mixed
     */
    public function stringAddress()
    {
        // $this->address = $this->address;
        $this->ward_id = $this->ward_id;
        $this->district_id = $this->district_id;
        $this->city_id = $this->city_id;
        return $this->locationToText();
    }
}
