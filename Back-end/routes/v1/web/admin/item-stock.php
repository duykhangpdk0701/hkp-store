<?php

use App\Http\Controllers\Admin\ItemPersonTypeController;
use App\Http\Controllers\Admin\ItemSizeController;
use App\Http\Controllers\Admin\ItemStockController;
use Illuminate\Support\Facades\Route;

Route::resource('item-stock', ItemStockController::class)
    ->parameter('item-stock', 'itemStock')
    ->names('item_stock');

Route::post('item-stock/{itemStock}/update-price', [ItemStockController::class, 'updatePrice'])
    ->middleware(['password.confirm'])
    ->name('item_stock.update_price');

Route::get('item-stock/{itemStock}/get-audits', [ItemStockController::class, 'getAudits'])
    ->name('item_stock.get_audits');
