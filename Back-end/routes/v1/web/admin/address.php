<?php

use App\Http\Controllers\Admin\SysCityController;
use App\Http\Controllers\Admin\SysDistrictController;
use Illuminate\Support\Facades\Route;

Route::get('city/', [SysCityController::class, 'index'])->name('address.city.index');
Route::get('city/{city}', [SysCityController::class, 'getDistrictsFromCity'])->name('address.city.get_districts');
Route::get('district/{district}', [SysDistrictController::class, 'getWardsFromDistrict'])->name('address.district.get_wards');
