<?php

use App\Http\Controllers\Api\ItemController;
use App\Http\Controllers\Api\ItemSizeController;
use Illuminate\Support\Facades\Route;

Route::get('item-price-ranges', [ItemController::class, 'getPriceRange'])->name('item.price_range');
