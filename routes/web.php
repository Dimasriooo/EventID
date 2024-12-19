<?php

use App\Http\Controllers\Admin\PackageController;
use Illuminate\Support\Facades\Route;

Route::get('/packages', [PackageController::class, 'index']);
