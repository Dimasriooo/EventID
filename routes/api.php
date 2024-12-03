<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PackageFeaturesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;


Route::post("/register", [AuthController::class, 
"register"]);
Route::post("/login", [AuthController::class, 
"login"]);


Route::middleware('api')->group(function () {
    Route::resource('bookings', BookingController::class);
    Route::resource('users', UserController::class);
    Route::resource('packages', PackageController::class);
    Route::resource('packagesFeatures', PackageFeaturesController::class);
});

