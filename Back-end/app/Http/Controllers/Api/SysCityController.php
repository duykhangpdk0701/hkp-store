<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\CityResource;
use App\Http\Resources\Api\DistrictResource;
use App\Models\SysCity;
use Illuminate\Http\Request;

/**
 * @group Address Endpoints
 */
class SysCityController extends Controller
{

    /**
     * Get city
     *
     * This endpoint lets you get a list of cities.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CityResource::collection(SysCity::all());
    }

    /**
     * Get a list of districts from city
     *
     * This endpoint lets you get a list of districts from city.
     *
     * @urlParam $city_id int required Get district after choose city.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDistrictsFromCity(SysCity $city)
    {
        return DistrictResource::collection($city->districts);
    }
}
