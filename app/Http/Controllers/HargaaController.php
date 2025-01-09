<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HargaaController extends Controller
{
    public function hitungHarga(Request $request)
    {
        $jumlahAnggota = $request->input('jumlah_anggota');
        $hargaPerOrang = 10000; // Harga per anggota
        $totalHarga = $jumlahAnggota * $hargaPerOrang;
    
        return response()->json(['total_harga' => $totalHarga]);
    }
}
