<?php

use App\Http\Controllers\Api\AddressController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'address'], function () {
  Route::post('/', [AddressController::class, 'store']);
  Route::put('/{address}', [AddressController::class, 'update']);
  Route::delete('/{address}', [AddressController::class, 'destroy']);
  Route::post('/{address}/set-to-default', [AddressController::class, 'setDefaultAddress']);
});
