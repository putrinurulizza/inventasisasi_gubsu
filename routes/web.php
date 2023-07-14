<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\LaporanBarangController;
use App\Http\Controllers\LaporanBulananBarangController;
use App\Http\Controllers\LaporanTahunanBarangController;
use App\Http\Controllers\LaporanMingguanBarangController;
use App\Http\Controllers\LaporanPeminjamanController;
use App\Http\Controllers\LaporanBulananPeminjamanController;
use App\Http\Controllers\LaporanTahunanPeminjamanController;
use App\Http\Controllers\LaporanMingguanPeminjamanController;
use App\Http\Controllers\ResetPasswordController;
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

    Route::put('/resetpassword/{user}', [ResetPasswordController::class, 'resetPasswordAdmin'])->name('resetpassword.resetPasswordAdmin')->middleware('auth');

    Route::prefix('/laporan')->group(function () {
        Route::prefix('/laporan-barang', )->group(function () {
            Route::get('dt-laporan', [LaporanBarangController::class, 'dt_laporan'])->name('laporan.dt-laporan')->middleware('auth');
            Route::resource('/laporan-barang-utama', LaporanBarangController::class)->except(['create', 'show', 'edit'])->middleware('auth');
            Route::resource('/laporan-barang-mingguan', LaporanMingguanBarangController::class)->except(['create', 'show', 'edit'])->middleware('auth');
            Route::resource('/laporan-barang-bulanan', LaporanBulananBarangController::class)->except(['create', 'show', 'edit'])->middleware('auth');
            Route::resource('/laporan-barang-tahunan', LaporanTahunanBarangController::class)->except(['create', 'show', 'edit'])->middleware('auth');
        });

        Route::prefix('/laporan-peminjaman', )->group(function () {
            Route::resource('/laporan-peminjaman-utama', LaporanPeminjamanController::class)->except(['create', 'show', 'edit'])->middleware('auth');
            Route::resource('/laporan-peminjaman-mingguan', LaporanMingguanPeminjamanController::class)->except(['create', 'show', 'edit'])->middleware('auth');
            Route::resource('/laporan-peminjaman-bulanan', LaporanBulananPeminjamanController::class)->except(['create', 'show', 'edit'])->middleware('auth');
            Route::resource('/laporan-peminjaman-tahunan', LaporanTahunanPeminjamanController::class)->except(['create', 'show', 'edit'])->middleware('auth');
        });
    });
});

// Route::fallback(function () {
//     return redirect()->route('login');
// });

// Route::fallback(function () {
//     if (session('url.intended')) {
//         return redirect(session('url.intended'));
//     } else {
//         return redirect()->route('login');
//     }
// });
