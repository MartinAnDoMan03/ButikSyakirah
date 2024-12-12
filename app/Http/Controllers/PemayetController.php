<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PemayetController extends Controller
{
    public function pemayet()
    {
        // Data untuk dashboard pemayet
        $dataPesanan = [
            ['id' => 1, 'nama' => 'Pesanan 3', 'status' => 'Dalam Proses'],
            ['id' => 2, 'nama' => 'Pesanan 4', 'status' => 'Selesai'],
        ];

        return view('pemayet.data_pesanan', compact('dataPesanan'));
    }
}
