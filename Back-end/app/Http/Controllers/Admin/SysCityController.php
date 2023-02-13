<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Address\CityResource;
use App\Http\Resources\Address\DistrictResource;
use App\Models\SysCity;
use Illuminate\Http\Request;

class SysCityController extends Controller
{
    /**
     * Get a list of districts from city
     *
     * @param SysCity $city
     * @return void
     */
    public function index()
    {
        return CityResource::collection(SysCity::all());
    }

    /**
     * Get a list of districts from city
     *
     * @param SysCity $city
     * @return void
     */
    public function getDistrictsFromCity(SysCity $city)
    {
        return DistrictResource::collection($city->districts);
    }
}
