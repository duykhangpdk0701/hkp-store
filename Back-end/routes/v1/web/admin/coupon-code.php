<?php

use App\Http\Controllers\Admin\CouponCodeController;
use App\Http\Controllers\Admin\CouponCodeEventController;
use Illuminate\Support\Facades\Route;

Route::resource('coupon-code', CouponCodeController::class);
Route::resource('coupon-code-event', CouponCodeEventController::class);

Route::get('create-random-code', [CouponCodeController::class, 'createRandom'])->name('coupon-code.create-random-code');
Route::post('create-random-code', [CouponCodeController::class, 'storeRandom'])->name('coupon-code.store-random-code');

Route::get('coupon-code-history', [CouponCodeController::class, 'getCouponCodeHistoryUsed'])->name('coupon-code.history');
