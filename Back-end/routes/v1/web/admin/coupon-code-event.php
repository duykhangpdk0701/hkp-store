<?php
use App\Http\Controllers\Admin\CouponCodeEventController;
use Illuminate\Support\Facades\Route;

Route::resource('coupon-code-event', CouponCodeEventController::class);
