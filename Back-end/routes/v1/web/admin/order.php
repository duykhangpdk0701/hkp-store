<?php

use App\Http\Controllers\Admin\OrderController;
use Illuminate\Support\Facades\Route;

Route::resource('order', OrderController::class);
Route::put('/update-order-status/{order}', [OrderController::class, 'updateStatusOrder'])->name('order.update-order-status');
Route::put('/update-payment-method/{order}', [OrderController::class, 'updatePaymentMethodOrder'])->name('order.update-payment-method');
