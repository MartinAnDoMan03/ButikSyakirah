<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenjahitController extends Controller
{
    public function penjahit()
    {
        // Data untuk dashboard penjahit
        $dataPesanan = [
            ['id' => 1, 'nama' => 'Pesanan 1', 'status' => 'Dalam Proses'],
            ['id' => 2, 'nama' => 'Pesanan 2', 'status' => 'Selesai'],
        ];

        return view('penjahit.data_pesanan', compact('dataPesanan'));
    }
}
