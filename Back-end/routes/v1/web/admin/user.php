<?php

use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
  Route::resource('user', UserController::class);

  Route::put('user/{user}/reset-password', [UserController::class, 'resetPassword'])->name('user.reset_password');

  Route::put('my-profile/change-password', [UserController::class, 'changePassword'])->name('my_profile.change_password');
  Route::get('my-profile', [UserController::class, 'myProfile'])->name('my_profile');

  Route::put('my-profile/update', [UserController::class, 'changeProfile'])->name('user.my_profile.update');
});
