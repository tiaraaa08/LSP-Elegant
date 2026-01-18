<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index()
    {

        // return view('layanan.main');
        $layanan = Layanan::all();

        return view('layanan.main', compact('layanan'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        //cek duplikat
        $harga = preg_replace('/\D/', '', $request->harga_per_kg);

        $duplikat = Layanan::where('nama_layanan', $request->nama_layanan)
        ->where('harga_per_kg', $harga)
        ->exists();

        if($duplikat) {
            return redirect()->back()->withErrors(['error' => 'Data layanan sudah tersedia']);
        }

        Layanan::create([
            'nama_layanan' => $request->nama_layanan,
            'harga_per_kg' => $harga,
        ]);

        return redirect()->back()->with('success', 'Layanan berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());

        $layanan = Layanan::find($id);
        $harga = preg_replace('/\D/', '', $request->harga_per_kg);

        // cek duplikat
        $duplikat = Layanan::where('nama_layanan', $request->nama_layanan)
        ->where('harga_per_kg', $harga)
        ->exists();

        if($duplikat) {
            return redirect()->back()->withErrors(['error' => 'Data layanan sudah tersedia']);
        }

        $layanan->update([
            'nama_layanan' => $request->nama_layanan,
            'harga_per_kg' => $harga
        ]);

        return redirect()->back()->with('success', 'Layanan berhasil diupdate');
    }

    public function destroy($id)
    {
        $layanan = Layanan::findOrFail($id);
        $layanan->delete();

        return redirect()->back()->with('success', 'Layanan berhasil dihapus');
    }
}
