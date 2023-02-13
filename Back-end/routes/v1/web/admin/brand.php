<?php

use App\Http\Controllers\Admin\BrandController;
use Illuminate\Support\Facades\Route;

Route::resource('brand', BrandController::class);

Route::put('brand/{brand}/toggle-status', [BrandController::class, 'toggleStatus'])->name('brand.toggle_status');
