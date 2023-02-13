<?php

use App\Http\Controllers\Admin\ItemPersonTypeController;
use App\Http\Controllers\Admin\ItemSizeController;
use Illuminate\Support\Facades\Route;


Route::resource('item-size', ItemSizeController::class)
    ->parameter('item-size', 'itemSize')
    ->names('item_size');

Route::get('item-person-type/{itemPersonType}', [ItemPersonTypeController::class, 'show'])->name('item_person_type.show');
