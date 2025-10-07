<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PendaftaranController;

Route::get('/', function () {
    return view('home');
})->name('home');

// step 1: form pendaftaran
Route::get('/pendaftaran', [PendaftaranController::class, 'formPendaftaran'])->name('pendaftaran.form');
Route::post('/pendaftaran', [PendaftaranController::class, 'storePendaftaran'])->name('pendaftaran.store');

Route::get('/search-sekolah', [PendaftaranController::class, 'searchSekolah'])->name('search.sekolah');
Route::get('/get-progli/{id_departemen}', [PendaftaranController::class, 'getProgli']);

Route::post('/pendaftaran/upload-surat', [PendaftaranController::class, 'uploadSurat'])->name('pendaftaran.uploadSurat');



// step 2: form pembimbing
Route::get('/pembimbing', [PendaftaranController::class, 'formPembimbing'])->name('pembimbing.form');
Route::post('/pembimbing', [PendaftaranController::class, 'storePembimbing'])->name('pembimbing.store');

// step 3: form siswa
Route::get('/siswa', [PendaftaranController::class, 'formSiswa'])->name('siswa.form');
Route::post('/siswa', [PendaftaranController::class, 'storeSiswa'])->name('siswa.store');

// selesai
Route::get('/selesai', [PendaftaranController::class, 'selesai'])->name('pendaftaran.selesai');

// cancel
Route::get('/batal', [PendaftaranController::class, 'cancel'])->name('pendaftaran.cancel');
