<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Address\WardResource;
use App\Models\SysDistrict;
use Illuminate\Http\Request;

class SysDistrictController extends Controller
{
    /**
     * Get the wards from the district
     *
     * @param SysDistrict $district
     * @return void
     */
    public function getWardsFromDistrict(SysDistrict $district)
    {
        return WardResource::collection($district->wards);
    }
}
