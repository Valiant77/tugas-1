<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\AnggotaController;

Route::get('/', function () {
    return view('homepage');
});
Route::get('/bukuform', function () {
    return view('bukuform');
});
Route::get('/anggotaform', function () {
    return view('anggotaform');
});
Route::get('/peminjamanform', [PeminjamanController::class, 'create']);

    
Route::resource('buku', BukuController::class);
Route::resource('peminjaman', PeminjamanController::class);
Route::resource('anggota', AnggotaController::class);