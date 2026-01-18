<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\StrukController;
use App\Http\Controllers\TransaksiController;
use App\Models\Layanan;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('dashboard');
// })->name('dashboard');
// Route::get('/transaksi', function () {
//     return view('transaksi.main');
// })->name('transaksi.index');
// Route::get('/layanan', function () {
//     return view('layanan.main');
// })->name('layanan.index');
// Route::get('/struk', function () {
//     return view('struk');
// })->name('struk');

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('layanan', [LayananController::class, 'index'])->name('layanan.index');
Route::post('Layanan/add', [LayananController::class, 'store'])->name('layanan.add');
Route::post('Layanan/update/{id}', [LayananController::class, 'update'])->name('layanan.update');
Route::delete('Layanan/destroy/{id}', [LayananController::class, 'destroy'])->name('layanan.destroy');

Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
Route::post('/transaksi/add', [TransaksiController::class, 'store'])->name('transaksi.add');
Route::post('/transaksi/update/{id}', [TransaksiController::class, 'update'])->name('transaksi.update');
Route::post('/transaksi/bayar/{id}', [TransaksiController::class, 'bayar'])->name('transaksi.bayar');
Route::delete('/transaksi/destroy/{id}', [TransaksiController::class, 'destroy'])->name('transaksi.destroy');

Route::get('struk/{id}', [StrukController::class, 'print'])->name('struk');