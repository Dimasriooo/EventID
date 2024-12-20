<?php

use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\PackageFeaturesController;
// use App\Http\Controllers\Admin\PackageFeaturesController;
use Illuminate\Support\Facades\Route;

Route::get('/packages', [PackageController::class, 'index']);

Route::get('/Bookings', [BookingController::class, 'Book']);

Route::get('/Features', [PackageFeaturesController::class, 'feature']);