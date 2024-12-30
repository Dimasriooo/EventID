<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PackageFeaturesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;


Route::post("/register", [AuthController::class, "register"]);
Route::post("/login", [AuthController::class, "login"]);


Route::middleware('auth:sanctum')->group(function () {

    // Route::resource('bookings', BookingController::class);
    Route::get('/bookings', [BookingController::class, "index"]);
    Route::post('/bookings', [BookingController::class, "store"]);
    Route::put('/bookings/{id}', [BookingController::class, "update"]);
    Route::delete('/bookings/{id}', [BookingController::class, "destroy"]);
    Route::get('/bookings/{id}', [BookingController::class, "Show"]);

    // Route::resource('users', UserController::class);
    Route::get('/users', [UserController::class, "index"]);
    Route::post('/users', [UserController::class, "store"]);
    Route::put('/users/{id}', [UserController::class, "update"]);
    Route::delete('/users/{id}', [UserController::class, "destroy"]);
    Route::get('/users/{id}', [UserController::class, "Show"]);

    // Route::resource('packages', PackageController::class);
    Route::get('/packages', [PackageController::class, "index"]);
    Route::post('/packages', [PackageController::class, "store"]);
    Route::put('/packages/{id}', [PackageController::class, "update"]);
    Route::delete('/packages/{id}', [PackageController::class, "destroy"]);
    Route::get('/packages/{id}', [PackageController::class, "Show"]);



    // Route::resource('packagesFeatures', PackageFeaturesController::class);
    Route::get('/packagesFeatures', [PackageFeaturesController::class, "index"]);
    Route::post('/packagesFeatures', [PackageFeaturesController::class, "store"]);
    Route::put('/packagesFeatures/{id}', [PackageFeaturesController::class, "update"]);
    Route::delete('/packagesFeatures/{id}', [PackageFeaturesController::class, "destroy"]);
    Route::get('/packagesFeatures/{id}', [PackageFeaturesController::class, "Show"]);
 
});

