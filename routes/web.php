<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\UserPerusahaanController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\GajiController;
use App\Http\Controllers\CutiController;

Route::middleware(['guest'])->group(function () {
    Route::get('/', [SesiController::class, 'index'])->name('login');
    Route::post('/', [SesiController::class, 'login']);
});

Route::get('/home', function () {
    return redirect('/dashboard');
});

Route::middleware(['auth'])->group(function () {

    // Redirect berdasarkan role user
    Route::get('/dashboard', [DashboardController::class, 'index']);

    // =============================
    // SUPERADMIN
    // =============================
    Route::middleware('userAkses:superadmin')->group(function () {
        Route::get('/dashboard/superadmin', [DashboardController::class, 'superadmin'])->name('dashboard.superadmin');

        // CRUD Perusahaan
        Route::get('/superadmin/perusahaan', [PerusahaanController::class, 'index'])->name('perusahaan.index');
        Route::get('/superadmin/perusahaan/create', [PerusahaanController::class, 'create'])->name('perusahaan.create');
        Route::post('/superadmin/perusahaan', [PerusahaanController::class, 'store'])->name('perusahaan.store');
        Route::get('/superadmin/perusahaan/{id}/edit', [PerusahaanController::class, 'edit'])->name('perusahaan.edit');
        Route::put('/superadmin/perusahaan/{id}', [PerusahaanController::class, 'update'])->name('perusahaan.update');
        Route::delete('/superadmin/perusahaan/{id}', [PerusahaanController::class, 'destroy'])->name('perusahaan.destroy');

        // CRUD User Perusahaan
        Route::get('/superadmin/user-perusahaan', [UserPerusahaanController::class, 'index'])->name('user-perusahaan.index');
        Route::get('/superadmin/user-perusahaan/create', [UserPerusahaanController::class, 'create'])->name('user-perusahaan.create');
        Route::post('/superadmin/user-perusahaan', [UserPerusahaanController::class, 'store'])->name('user-perusahaan.store');
        Route::get('/superadmin/user-perusahaan/{id}/edit', [UserPerusahaanController::class, 'edit'])->name('user-perusahaan.edit');
        Route::put('/superadmin/user-perusahaan/{id}', [UserPerusahaanController::class, 'update'])->name('user-perusahaan.update');
        Route::delete('/superadmin/user-perusahaan/{id}', [UserPerusahaanController::class, 'destroy'])->name('user-perusahaan.destroy');

        // Profil
        Route::get('/superadmin/profil', [DashboardController::class, 'profilSuperadmin'])->name('profil.superadmin');
    });

    // =============================
    // ADMIN PERUSAHAAN
    // =============================
    Route::middleware('userAkses:adminperusahaan')->group(function () {
        Route::get('/dashboard/admin', [DashboardController::class, 'admin'])->name('dashboard.admin');

        // Gaji
        Route::get('/admin/gaji', [GajiController::class, 'index'])->name('gaji.index');
        Route::get('/admin/gaji/create', [GajiController::class, 'create'])->name('gaji.create');
        Route::post('/admin/gaji', [GajiController::class, 'store'])->name('gaji.store');
        Route::get('/admin/gaji/{id}/edit', [GajiController::class, 'edit'])->name('gaji.edit');
        Route::put('/admin/gaji/{id}', [GajiController::class, 'update'])->name('gaji.update');
        Route::delete('/admin/gaji/{id}', [GajiController::class, 'destroy'])->name('gaji.destroy');

        // Cuti
        Route::get('/admin/cuti', [CutiController::class, 'index'])->name('cuti.index');
        Route::get('/admin/cuti/create', [CutiController::class, 'create'])->name('cuti.create');
        Route::post('/admin/cuti', [CutiController::class, 'store'])->name('cuti.store');
        Route::get('/admin/cuti/{id}/edit', [CutiController::class, 'edit'])->name('cuti.edit');
        Route::put('/admin/cuti/{id}', [CutiController::class, 'update'])->name('cuti.update');
        Route::delete('/admin/cuti/{id}', [CutiController::class, 'destroy'])->name('cuti.destroy');

        // Profil dan Karyawan
        Route::get('/admin/profil', [DashboardController::class, 'profilAdmin'])->name('profil.admin');
        Route::get('/admin/karyawan', [KaryawanController::class, 'index'])->name('karyawan.index');
        Route::get('/admin/karyawan/create', [KaryawanController::class, 'create'])->name('karyawan.create');
        Route::post('/admin/karyawan', [KaryawanController::class, 'store'])->name('karyawan.store');
        Route::get('/admin/karyawan/{id}/edit', [KaryawanController::class, 'edit'])->name('karyawan.edit');
        Route::put('/admin/karyawan/{id}', [KaryawanController::class, 'update'])->name('karyawan.update');
        Route::delete('/admin/karyawan/{id}', [KaryawanController::class, 'destroy'])->name('karyawan.destroy');
    });

    // =============================
    // KARYAWAN
    // =============================
    Route::middleware('userAkses:karyawan')->group(function () {
        Route::get('/dashboard/karyawan', [DashboardController::class, 'karyawan'])->name('dashboard.karyawan');
        Route::get('/karyawan/gaji', [DashboardController::class, 'lihatGaji'])->name('gaji.lihat');
        Route::get('/karyawan/profil', [DashboardController::class, 'profilKaryawan'])->name('profil.karyawan');

    Route::get('/karyawan/ajukan', [CutiController::class, 'formKaryawan'])->name('cuti.ajukan');
    Route::post('/karyawan/ajukan', [CutiController::class, 'store'])->name('cuti.ajukan.store');

//     Route::get('/karyawan/ajukan-cuti', [CutiController::class, 'formKaryawan'])->name('cuti.ajukan');
// Route::post('/karyawan/ajukan-cuti', [CutiController::class, 'store'])->name('cuti.ajukan.store');

Route::get('/karyawan/lihat-gaji', [DashboardController::class, 'lihatGaji'])->name('karyawan.gaji');

    });

    // =============================
    // LOGOUT
    // =============================
    Route::get('/logout', [SesiController::class, 'logout'])->name('logout');
});
