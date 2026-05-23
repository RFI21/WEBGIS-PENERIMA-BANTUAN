<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminAccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\kemiskinanController;
use App\Http\Controllers\penerimaController;




// ROUTE USER PUBLIK
Route::prefix('/')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('user.index');
    Route::get('/bpnt', [UserController::class, 'bpnt'])->name('user.bpnt');
    Route::get('/pkh', [UserController::class, 'pkh'])->name('user.pkh');
    Route::get('/laporan', [UserController::class, 'laporan'])->name('user.laporan');
    Route::get('/laporan/download/{tahun}', [UserController::class, 'downloadLaporan'])->name('laporan.download');
    Route::get('/bansos', [UserController::class, 'bansos'])->name('user.bansos');
    Route::get('/penerima', [UserController::class, 'penerima'])->name('user.penerima');
    Route::get('/kemiskinan', [UserController::class, 'kemiskinan'])->name('user.kemiskinan');
    Route::get('/profil', [UserController::class, 'profil'])->name('user.profil');
    Route::get('/login', [UserController::class, 'login'])->name('user.login');
});

// ROUTE LOGIN dan LOGOUT
// Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/admin1', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// ROUTE ADMIN (dengan middleware auth)
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin', [AdminController::class, 'admin'])->name('admin.admin');


    // CRUD Admin
    Route::get('/tambahadmin', [AdminAccountController::class, 'tambahadmin'])->name('admin.tambahadmin');
    Route::post('/simpanadmin', [AdminAccountController::class, 'simpanadmin'])->name('admin.simpanadmin');
    Route::delete('/admin/{id}', [AdminController::class, 'hapusadmin'])->name('admin.hapus');
    Route::get('/editadmin/{id}', [AdminAccountController::class, 'editadmin'])->name('admin.editadmin');
    Route::put('/editadmin/{id}', [AdminAccountController::class, 'update'])->name('admin.updateadmin');



    Route::get('/kemiskinan', [kemiskinanController::class, 'index'])->name('admin.kemiskinan');
    Route::get('/kemiskinan/tambah', [kemiskinanController::class, 'create'])->name('admin.kemiskinan.tambah');
    Route::post('/kemiskinan/simpan', [kemiskinanController::class, 'store'])->name('admin.kemiskinan.simpan');
    Route::get('/kemiskinan/edit/{id}', [kemiskinanController::class, 'edit'])->name('admin.kemiskinan.edit');
    Route::put('/kemiskinan/update/{id}', [kemiskinanController::class, 'update'])->name('admin.kemiskinan.update');
    Route::delete('/kemiskinan/hapus/{id}', [kemiskinanController::class, 'destroy'])->name('admin.kemiskinan.hapus');

    Route::get('/penerima', [penerimaController::class, 'index'])->name('admin.penerima');
    Route::get('/penerima/tambah', [penerimaController::class, 'create'])->name('admin.penerima.tambah');
    Route::post('/penerima/simpan', [penerimaController::class, 'store'])->name('admin.penerima.simpan');
    Route::get('/penerima/edit/{id}', [penerimaController::class, 'edit'])->name('admin.penerima.edit');
    Route::put('/penerima/update/{id}', [penerimaController::class, 'update'])->name('admin.penerima.update');
    Route::delete('/penerima/hapus/{id}', [penerimaController::class, 'destroy'])->name('admin.penerima.hapus');

    // Route::get('/bansos', [bansosController::class, 'index'])->name('admin.bansos');
    // Route::get('/bansos/tambah', [bansosController::class, 'create'])->name('admin.bansos.tambah');
    // Route::post('/bansos/simpan', [bansosController::class, 'store'])->name('admin.bansos.simpan');
    // Route::get('/bansos/edit/{id}', [bansosController::class, 'edit'])->name('admin.bansos.edit');
    // Route::put('/bansos/update/{id}', [bansosController::class, 'update'])->name('admin.bansos.update');
    // Route::delete('/bansos/hapus/{id}', [bansosController::class, 'destroy'])->name('admin.bansos.hapus');
   
    // Route::get('/kelompoktani', [kelompoktaniController::class, 'index'])->name('admin.kelompoktani');
    // Route::get('/kelompoktani/tambah', [kelompoktaniController::class, 'create'])->name('admin.kelompoktani.tambah');
    // Route::post('/kelompoktani/simpan', [kelompoktaniController::class, 'store'])->name('admin.kelompoktani.simpan');
    // Route::get('/kelompoktani/edit/{id}', [kelompoktaniController::class, 'edit'])->name('admin.kelompoktani.edit');
    // Route::put('/kelompoktani/update/{id}', [kelompoktaniController::class, 'update'])->name('admin.kelompoktani.update');
    // Route::delete('/kelompoktani/hapus/{id}', [kelompoktaniController::class, 'destroy'])->name('admin.kelompoktani.hapus');
   
    // Route::get('/penduduk', [pendudukController::class, 'index'])->name('admin.penduduk');
    // Route::get('/penduduk/tambah', [pendudukController::class, 'create'])->name('admin.penduduk.tambah');
    // Route::post('/penduduk/simpan', [pendudukController::class, 'store'])->name('admin.penduduk.simpan');
    // Route::get('/penduduk/edit/{id}', [pendudukController::class, 'edit'])->name('admin.penduduk.edit');
    // Route::put('/penduduk/update/{id}', [pendudukController::class, 'update'])->name('admin.penduduk.update');
    // Route::delete('/penduduk/hapus/{id}', [pendudukController::class, 'destroy'])->name('admin.penduduk.hapus');
    });

