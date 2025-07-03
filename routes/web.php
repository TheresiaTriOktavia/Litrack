<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\RegDevController;
use App\Http\Controllers\LocationController;

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
    
    Route::get('/home', 'home')->name('home');
    Route::post('/logout', 'logout')->name('logout');
});
// Forgot password form
Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink'])->name('password.email');

// Reset password form
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');
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


// Registered Device
Route::get('/register-device', [RegDevController::class, 'index'])->name('regdev.index');
Route::post('/register-device', [RegDevController::class, 'store'])->name('regdev.store');
Route::put('/register-device/{id_rd}', [RegDevController::class, 'update'])->name('regdev.update');
Route::delete('/register-device/{id_rd}', [RegDevController::class, 'destroy'])->name('regdev.destroy');
Route::get('/register-device/{id_rd}', [RegDevController::class, 'show'])->name('regdev.show');

/*
|--------------------------------------------------------------------------
| Location Routes
|--------------------------------------------------------------------------
*/
Route::prefix('location')->group(function () {
    Route::get('/', [LocationController::class, 'index'])->name('location.index');
    Route::post('/', [LocationController::class, 'store'])->name('location.store');
    Route::put('/{id_lok}', [LocationController::class, 'update'])->name('location.update');
    Route::delete('/{id_lok}', [LocationController::class, 'destroy'])->name('location.destroy');
});