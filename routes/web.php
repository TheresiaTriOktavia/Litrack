<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\DeviceController;

/*
|--------------------------------------------------------------------------
| AUTH Routes (Login & Register)
|--------------------------------------------------------------------------
*/
Route::controller(LoginRegisterController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::post('/logout', 'logout')->name('logout');
});

/*
|--------------------------------------------------------------------------
| DASHBOARD Routes
|--------------------------------------------------------------------------
*/
Route::controller(DashboardController::class)->group(function () {
    Route::get('/', 'dashboard')->name('dashboard');
    Route::get('/dashboard', 'dashboard');
});

/*
|--------------------------------------------------------------------------
| DEVICE MANAGEMENT Routes
|--------------------------------------------------------------------------
*/
Route::prefix('device')->group(function () {
    Route::get('/', [DeviceController::class, 'index'])->name('device.index');
    Route::get('/create', [DeviceController::class, 'create'])->name('device.create');
    Route::post('/', [DeviceController::class, 'store'])->name('device.store');
    Route::get('/{id_dev}', [DeviceController::class, 'show'])->name('device.show');
    Route::get('/{id_dev}/edit', [DeviceController::class, 'edit'])->name('device.edit');
    Route::put('/{id_dev}', [DeviceController::class, 'update'])->name('device.update');
    Route::delete('/{id_dev}', [DeviceController::class, 'destroy'])->name('device.destroy');
});

/*
|--------------------------------------------------------------------------
| WELCOME Default View
|--------------------------------------------------------------------------
*/
Route::get('/welcome', function () {
    return view('welcome');
});
