<?php

use Illuminate\Support\Facades\Route;

// --- IMPORT CONTROLLER DENGAN ALIAS YANG JELAS ---
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CarController; // <--- Controller Publik
use App\Http\Controllers\Auth\AuthController;

// Controller Admin kita kasih alias 'Admin...'
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\CarController as AdminCarController;
use App\Http\Controllers\Admin\UserController as AdminUserController;

/*
|--------------------------------------------------------------------------
| ROUTE PUBLIK
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    // Tampilkan 6 mobil terbaru di home
    $cars = \App\Models\Car::where('status', 'available')->latest()->take(6)->get();
    return view('home', compact('cars'));
})->name('home');

Route::get('/mobil', [CarController::class, 'index'])->name('cars.index');

// INI YANG SEBELUMNYA ERROR. Pastikan pakai [CarController::class] (Publik)
Route::get('/mobil/{car}', [CarController::class, 'show'])->name('cars.show');


/*
|--------------------------------------------------------------------------
| ROUTE AUTH
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});


/*
|--------------------------------------------------------------------------
| ROUTE ADMIN
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Resource Controller untuk Admin
    Route::resource('cars', AdminCarController::class);
    Route::resource('users', AdminUserController::class);
});
