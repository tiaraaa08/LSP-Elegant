<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class StrukController extends Controller
{
    public function print($id) {
        $transaksi = Transaksi::find($id);

        return view('struk', compact('transaksi'));
    }
}
