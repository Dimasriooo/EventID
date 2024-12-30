<?php

use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\PackageFeaturesController;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('layouts.index');
// });

Route::get('/', [DashboardController::class, 'index']);


Route::get('/packages', [PackageController::class, 'index']);

Route::get('/Bookings', [BookingController::class, 'Book']);

Route::get('/Features', [PackageFeaturesController::class, 'feature']);


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');