<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Auth\LoginRegisterController;
// use App\Http\Controllers\DeviceController;
use App\Http\Controllers\DeviceController;

Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::post('/logout', 'logout')->name('logout');

});

Route::controller(DashboardController::class)->group(function() {
    Route::get('/', 'dashboard')->name('dashboard');
    Route::get('/dashboard', 'dashboard')->name('dashboard');

});

// // Device Management Routes
Route::prefix('device')->group(function () {
    Route::get('/', [DeviceController::class, 'index'])->name('device.index');
    Route::get('/create', [DeviceController::class, 'create'])->name('device.create');
    Route::post('/', [DeviceController::class, 'store'])->name('device.store');
    Route::get('/{id_dev}', [DeviceController::class, 'show'])->name('device.show');
    Route::get('/{id_dev}/edit', [DeviceController::class, 'edit'])->name('device.edit');
    Route::put('/{id_dev}', [DeviceController::class, 'update'])->name('device.update');
    Route::delete('/{id_dev}', [DeviceController::class, 'destroy'])->name('device.destroy');
});

// Route::get('/data', [DeviceController::class, 'index'])->name('device.data');
Route::get('/', function(){
    return view('welcome');
});

// Route::controller(DeviceController::class)->group(function(){
//     Route::post('/device/create', 'addDevice');
// });

// Route::resource('/devices',  [DeviceController::class, 'index'])->name('device.index');
