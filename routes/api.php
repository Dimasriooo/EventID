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
    // Route::resource('bookings', BookingController::class);
    Route::get('/bookings', [BookingController::class, "index"]);
    Route::post('/bookings', [BookingController::class, "store"]);
    Route::put('/bookings/{id}', [BookingController::class, "update"]);
    Route::delete('/bookings/{id}', [BookingController::class, "destroy"]);
    Route::get('/bookings/{id}', [BookingController::class, "Show"]);

    Route::resource('users', UserController::class);
    Route::resource('packages', PackageController::class);
    Route::resource('packagesFeatures', PackageFeaturesController::class);
});

