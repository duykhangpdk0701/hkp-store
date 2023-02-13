<?php

use App\Http\Controllers\Api\BrandController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'brand'], function () {
    Route::get('/', [BrandController::class, 'index'])->name('brand.index');
});
