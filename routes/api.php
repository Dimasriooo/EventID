<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api\BookingController;
use Illuminate\Support\Facades\Route;

Route::middleware('api')->group(function () {
    Route::resource('bookings', BookingController::class);
});

