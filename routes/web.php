<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PendaftaranController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/tentang', function () {
    return view('about');
})->name('about');

Route::get('/syarat-pkl', function () {
    return view('requirements');
})->name('requirements');


// 
// Route::get('/pendaftaran', [PendaftaranController::class, 'formPendaftaran'])->name('pendaftaran.form');
// Route::post('/pendaftaran', [PendaftaranController::class, 'storePendaftaran'])->name('pendaftaran.store');

// Route::get('/search-sekolah', [PendaftaranController::class, 'searchSekolah'])->name('search.sekolah');
// Route::get('/get-progli/{id_departemen}', [PendaftaranController::class, 'getProgli']);

// Route::post('/pendaftaran/upload-surat', [PendaftaranController::class, 'uploadSurat'])->name('pendaftaran.uploadSurat');



// 
// Route::get('/pembimbing', [PendaftaranController::class, 'formPembimbing'])->name('pembimbing.form');
// Route::post('/pembimbing', [PendaftaranController::class, 'storePembimbing'])->name('pembimbing.store');

// 
// Route::get('/siswa', [PendaftaranController::class, 'formSiswa'])->name('siswa.form');
// Route::post('/siswa', [PendaftaranController::class, 'storeSiswa'])->name('siswa.store');

// Route::post('/siswa/upload-foto-siswa', [PendaftaranController::class, 'uploadFotoSiswa'])->name('siswa.uploadFotoSiswa');


// // cancel
// Route::get('/batal', [PendaftaranController::class, 'cancel'])->name('pendaftaran.cancel');

Route::middleware(\App\Http\Middleware\ClearPendaftaranSession::class)->group(function() {
    // step 1: form pendaftaran
    Route::get('/pendaftaran', [PendaftaranController::class, 'formPendaftaran'])->name('pendaftaran.form');
    Route::post('/pendaftaran', [PendaftaranController::class, 'storePendaftaran'])->name('pendaftaran.store');

    Route::get('/search-sekolah', [PendaftaranController::class, 'searchSekolah'])->name('search.sekolah');
    Route::get('/get-progli/{id_departemen}', [PendaftaranController::class, 'getProgli']);

    // step 2: form pembimbing
    Route::get('/pembimbing', [PendaftaranController::class, 'formPembimbing'])->name('pembimbing.form');
    Route::post('/pembimbing', [PendaftaranController::class, 'storePembimbing'])->name('pembimbing.store');

    // step 3: form siswa
    Route::get('/siswa', [PendaftaranController::class, 'formSiswa'])->name('siswa.form');
    Route::post('/siswa', [PendaftaranController::class, 'storeSiswa'])->name('siswa.store');

    Route::post('/pendaftaran/upload-surat', [PendaftaranController::class, 'uploadSurat'])->name('pendaftaran.uploadSurat');
    Route::post('/siswa/upload-foto-siswa', [PendaftaranController::class, 'uploadFotoSiswa'])->name('siswa.uploadFotoSiswa');

    // batal
    Route::get('/batal', [PendaftaranController::class, 'cancel'])->name('pendaftaran.cancel');

    // selesai
    Route::get('/selesai', [PendaftaranController::class, 'selesai'])->name('pendaftaran.selesai');
});

