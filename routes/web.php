<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| ROUTE SISWA
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    Route::get('/siswa/dashboard',[SiswaController::class,'dashboard']);

    Route::get('/form-pendaftaran',[SiswaController::class,'form']);
    Route::post('/form-pendaftaran',[SiswaController::class,'simpan']);
    Route::get('/form-pendaftaran/edit',[SiswaController::class,'edit']);
    Route::post('/form-pendaftaran/update',[SiswaController::class,'update']);

    Route::get('/upload-berkas',[SiswaController::class,'uploadForm']);
    Route::post('/upload-berkas',[SiswaController::class,'uploadBerkas']);
    Route::post('/hapus-berkas/{id}', [SiswaController::class, 'hapusBerkas']);
});

/*
|--------------------------------------------------------------------------
| ROUTE ADMIN
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->prefix('admin')->group(function () {

    // dashboard
    Route::get('/dashboard',[AdminController::class,'dashboard']);

    // data pendaftar
    Route::get('/pendaftar/pending',[AdminController::class,'pending']);
    Route::get('/pendaftar/lulus',[AdminController::class,'lulus']);
    Route::get('/pendaftar/cadangan',[AdminController::class,'cadangan']);
    Route::get('/pendaftar/ditolak',[AdminController::class,'ditolak']);

    Route::get('/pendaftar/{id}',[AdminController::class,'detail']);
    Route::post('/verifikasi/{id}',[AdminController::class,'verifikasi']);
    Route::post('/nilai', [AdminController::class,'nilai']);

    // laporan (⚠️ URUTAN PENTING)
    Route::get('/laporan',[AdminController::class,'laporan']);
    Route::get('/laporan/cetak',[AdminController::class,'cetakLaporan']);

    // route parameter PALING BAWAH
    Route::get('/laporan/status_pendaftaran/{status_pendaftaran}',[AdminController::class,'laporanStatus']);
});

/*
|--------------------------------------------------------------------------
| AUTH & LANDING
|--------------------------------------------------------------------------
*/
Route::get('/', [LandingController::class, 'index']);

Route::get('/register',[AuthController::class,'register']);
Route::post('/register',[AuthController::class,'store']);

Route::get('/login',[AuthController::class,'login']);
Route::post('/login',[AuthController::class,'authenticate']);

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');