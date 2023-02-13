<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\OrderStatusController;

Route::get('/get-status/{id}', [OrderStatusController::class, 'getStatusOrder'])->name('order_status.get_status');
