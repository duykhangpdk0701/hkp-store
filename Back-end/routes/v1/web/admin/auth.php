<?php

use App\Http\Controllers\Admin\Auth\ConfirmPasswordController;
use App\Http\Controllers\Admin\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login.show-form');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');


Route::get('password-confirm', [ConfirmPasswordController::class, 'showConfirmForm'])->name('password.show_confirm_form');
Route::post('password-confirm', [ConfirmPasswordController::class, 'confirm'])->name('password.confirm');
