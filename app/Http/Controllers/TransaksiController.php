<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $layanan = Layanan::all();
        $transaksi = Transaksi::all();

        return view('transaksi.main', compact('layanan', 'transaksi'));
    }

    public function store(Request $request)
    {
        Transaksi::create([
            'waktu_transaksi' => $request->waktu_transaksi,
            'nama_pelanggan' => $request->nama_pelanggan,
            'id_layanan' => $request->id_layanan,
            'berat' => $request->berat,
            'pembayaran' => $request->pembayaran,
            'keterangan' => 'Proses'
        ]);

        return redirect()->back()->with('success', 'Transaksi berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $transaksi = Transaksi::find($id);

        $transaksi->update([
            'waktu_transaksi' => $request->waktu_transaksi,
            'nama_pelanggan' => $request->nama_pelanggan,
            'id_layanan' => $request->id_layanan,
            'berat' => $request->berat,
            'pembayaran' => $request->pembayaran,
            'keterangan' => $request->keterangan
        ]);

        return redirect()->back()->with('success', 'Transaksi berhasil diperbarui');
    }

    public function bayar($id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi->pembayaran = 'Lunas';
        $transaksi->save();

        return redirect()->back()->with('success', 'Transaksi berhasil dilunaskan');
    }

    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();

        return redirect()->back()->with('success', 'Transaksi berhasil dihapus');
    }
}
