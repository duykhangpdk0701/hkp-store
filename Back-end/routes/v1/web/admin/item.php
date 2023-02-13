<?php

use App\Http\Controllers\Admin\ItemController;
use Illuminate\Support\Facades\Route;

Route::resource('item', ItemController::class);

Route::delete('item/{item}/delete-size', [ItemController::class, 'deleteSize'])->name('item.delete_size');
Route::post('item/{item}/add-size', [ItemController::class, 'addSize'])->name('item.add_size');

Route::delete('item/{media}/delete-media', [ItemController::class, 'removeMedia'])->name('item.delete_media');
Route::post('item/{item}/add-media', [ItemController::class, 'addMedia'])->name('item.add_media');

Route::get('item/{item}/item-variant/{itemVariant}', [ItemController::class, 'showVariant'])->name('item.item_variant.show');
Route::get('get-inbound-row', [ItemController::class, 'getInboundRow'])->name('item.inbound_row');

Route::put('item/{item}/toggle-featured', [ItemController::class, 'toggleFeatured'])->name('item.toggle_featured');
Route::put('item/{item}/toggle-status', [ItemController::class, 'toggleStatus'])->name('item.toggle_status');
Route::put('item/{item}/toggle-media-type', [ItemController::class, 'toggleMediaType'])->name('item.toggle_media_type');
