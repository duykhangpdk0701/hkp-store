<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Address\WardResource;
use App\Models\SysDistrict;
use Illuminate\Http\Request;

/**
 * @group Address Endpoints
 */
class SysDistrictController extends Controller
{
    /**
     * Get a list of wards from district
     *
     * This endpoint lets you get a list of districts from city.
     *
     * @urlParam $district_id int required Get ward after choose district.
     *
     * @return \Illuminate\Http\Response
     */
    public function getWardsFromDistrict(SysDistrict $district)
    {
        return WardResource::collection($district->wards);
    }
}
