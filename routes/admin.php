<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use Illuminate\Support\Facades\Route;





Route::get('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login');
Route::get('/admin/forgot-password', [AdminAuthController::class, 'passwordRequest'])->name('admin.password-request');


Route::group(['middleware' => ['auth', 'user.type:admin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    // profile admin
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile-password', [ProfileController::class, 'changePassword'])->name('profile-password.update');
});
