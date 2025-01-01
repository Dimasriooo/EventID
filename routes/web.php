<?php

use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\PackageFeaturesController;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;


// Route::get('/', function () {
//     return view('layouts.index');
// });

Route::get('/', [DashboardController::class, 'index']);

Route::resource('packages', PackageController::class);
Route::get('/packages', [PackageController::class, 'index'])->name('packages.index');;
Route::get('/packages/create', [PackageController::class, 'create'])->name('packages.create');
Route::get('/packages/{id}/edit', [PackageController::class, 'edit'])->name('packages.edit');
Route::put('/packages/{id}', [PackageController::class, 'update'])->name('packages.update');
Route::delete('/packages/{id}', [PackageController::class, 'destroy'])->name('packages.destroy');

// Route::get('/Bookings', [BookingController::class, 'Book']);


Route::get('/booking', [BookingController::class, 'index'])->name('booking.index');
Route::get('/booking/create', [BookingController::class, 'create'])->name('booking.create');
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
Route::get('/booking/{id}/edit', [BookingController::class, 'edit'])->name('booking.edit');
Route::put('/booking/{id}', [BookingController::class, 'update'])->name('booking.update');
Route::delete('/booking/{id}', [BookingController::class, 'destroy'])->name('booking.destroy');



// Route::get('/Features', [PackageFeaturesController::class, 'feature']);

// Resource route (bisa digunakan salah satu saja, dengan resource atau define manual)
Route::resource('package-featured', PackageFeaturesController::class);

// Atau definisi manual seperti ini
Route::get('/featured', [PackageFeaturesController::class, 'index'])->name('featured.index');
Route::get('/featured/create', [PackageFeaturesController::class, 'create'])->name('featured.create');
Route::post('/featured', [PackageFeaturesController::class, 'store'])->name('featured.store');
Route::get('/featured/{id}/edit', [PackageFeaturesController::class, 'edit'])->name('featured.edit');
Route::put('/featured/{id}', [PackageFeaturesController::class, 'update'])->name('featured.update');
Route::delete('/featured/{id}', [PackageFeaturesController::class, 'destroy'])->name('featured.destroy');





// Group routes under the 'admin' prefix and 'admin.' name
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');






Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');




Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
