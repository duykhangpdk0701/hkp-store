<?php

use App\Http\Controllers\Api\ItemColorController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'item-color'], function () {
    Route::get('/', [ItemColorController::class, 'index'])->name('item-color.index');
});
