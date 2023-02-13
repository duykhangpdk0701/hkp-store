<?php

use App\Http\Controllers\Admin\ItemCategoryController;
use Illuminate\Support\Facades\Route;

Route::get('item-category', [ItemCategoryController::class, 'index'])->name('item_category.index');

Route::get('item-category/create', [ItemCategoryController::class, 'create'])->name('item_category.create');
Route::post('item-category', [ItemCategoryController::class, 'store'])->name('item_category.store');

Route::get('item-category/{itemCategory}/edit', [ItemCategoryController::class, 'edit'])->name('item_category.edit');
Route::put('item-category/{itemCategory}', [ItemCategoryController::class, 'update'])->name('item_category.update');

Route::delete('item-category/{itemCategory}', [ItemCategoryController::class, 'destroy'])->name('item_category.destroy');

Route::put('item-category/{itemCategory}/toggle-status', [ItemCategoryController::class, 'toggleStatus'])->name('item_category.toggle_status');
