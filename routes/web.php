<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/pcr', function () {
    return 'Selamat Datang di Website Kampus PCR!';
});

Route::get('/about', function () {
    return view('halaman-about');
});

Route::get('/nama/{param1}', function ($param1) {
    return 'Nama saya: '.$param1;
});


Route::get('/nim/{param1?}', function ($param1 = '') {
    return 'NIM saya: '.$param1;
});

Route::get('/mahasiswa/{param1?}', [MahasiswaController::class, 'show'])->name('mahasiswa.show');;

Route::get('/home',[HomeController::class,'index']);

Route::get('/pegawai', [PegawaiController::class, 'index']);
