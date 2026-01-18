<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $layanan = Layanan::all();
        $transaksi = Transaksi::all();

        $proses = Transaksi::where('keterangan', 'Proses')->get();
        $belumBayar = Transaksi::where('pembayaran', 'Belum Bayar')->get();

        return view('dashboard', compact('layanan', 'transaksi', 'proses', 'belumBayar'));
    }
}
