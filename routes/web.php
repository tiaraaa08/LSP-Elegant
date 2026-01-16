<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');
Route::get('/transaksi', function () {
    return view('transaksi.main');
})->name('transaksi.index');
Route::get('/layanan', function () {
    return view('layanan.main');
})->name('layanan.index');
Route::get('/struk', function () {
    return view('struk');
})->name('struk');
