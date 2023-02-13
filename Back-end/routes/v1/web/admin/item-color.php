<?php

use App\Http\Controllers\Admin\ItemColorController;
use Illuminate\Support\Facades\Route;


Route::resource('item-color', ItemColorController::class)
  ->names('item_color');
