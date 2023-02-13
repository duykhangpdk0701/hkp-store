<?php

use App\Http\Controllers\Api\ItemController;
use App\Http\Controllers\Api\ItemSizeController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'item'], function () {
    Route::get('/', [ItemController::class, 'index'])->name('item.index');
    Route::get('/{slug}', [ItemController::class, 'show'])->name('item.show');
});
