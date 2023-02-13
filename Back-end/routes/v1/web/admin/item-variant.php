<?php

use App\Http\Controllers\Admin\ItemVariantController;
use Illuminate\Support\Facades\Route;

Route::resource('item-variant', ItemVariantController::class)
    ->parameter('item-variant', 'itemVariant')
    ->names('item_variant');

Route::put('item-variant/{itemVariant}/toggle-status', [ItemVariantController::class, 'toggleStatus'])->name('item_variant.toggle_status');
