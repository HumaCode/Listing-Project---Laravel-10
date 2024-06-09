<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AmenityController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\ListingController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\ProfileController;
use Illuminate\Support\Facades\Route;





Route::get('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login')->middleware('guest');
Route::get('/admin/forgot-password', [AdminAuthController::class, 'passwordRequest'])->name('admin.password-request')->middleware('guest');


Route::group(['middleware' => ['auth', 'user.type:admin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    // profile admin
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile-password', [ProfileController::class, 'changePassword'])->name('profile-password.update');

    // hero routes
    Route::get('/hero', [HeroController::class, 'index'])->name('hero.index');
    Route::put('/hero', [HeroController::class, 'update'])->name('hero.update');

    // category routes
    Route::resource('/category', CategoryController::class);

    // location routes
    Route::resource('/location', LocationController::class);

    // amenity routes
    Route::resource('/amenity', AmenityController::class);

    // listing routes
    Route::resource('/listing', ListingController::class);
});

// slug route
Route::get('/category/checkSlug', [CategoryController::class, 'checkSlug'])->name('slug.category');
Route::get('/location/checkSlug', [LocationController::class, 'checkSlug'])->name('slug.location');
Route::get('/amenity/checkSlug', [AmenityController::class, 'checkSlug'])->name('slug.amenity');
Route::get('/listing/checkSlug', [ListingController::class, 'checkSlug'])->name('slug.listing');
