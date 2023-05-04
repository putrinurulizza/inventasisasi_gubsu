<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login')->middleware('guest');
    Route::post('/login', 'login');
    Route::post('/logout', 'logout');
});

Route::prefix('/dashboard')->group(function (){
    Route::get('/home',[DashboardController::class, 'index'])->name('dashboard.index')->middleware('auth');

    Route::resource('/kategori', KategoriController::class)->except(['create', 'show', 'edit'])->middleware('auth');

    Route::resource('/barang', BarangController::class)->except(['create', 'show', 'edit'])->middleware('auth');

    Route::resource('/peminjaman', PeminjamanController::class)->except(['create', 'show', 'edit'])->middleware('auth');

    Route::resource('/user', UserController::class)->except(['create', 'show', 'edit'])->middleware('auth');

    Route::prefix('/laporan')->group(function () {
        Route::get('/', [LaporanController::class, 'index'])->middleware('auth');
    });
});

Route::fallback(function () {
    return redirect()->route('login');
});

