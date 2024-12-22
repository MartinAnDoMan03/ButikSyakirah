<?php

namespace App\Http\Controllers;
use App\Models\Order;

use Illuminate\Http\Request;

class PengguntingController extends Controller
{
    // Metode khusus untuk dashboard penggunting
    public function penggunting()
    {
        // Ambil data pesanan atau logika lainnya
        $dataPesanan = [
            ['id' => 1, 'nama' => 'Pesanan 1', 'status' => 'Proses Pengguntingan'],
            ['id' => 2, 'nama' => 'Pesanan 2', 'status' => 'Selesai'],
        ];

        // Return view dengan data pesanan
        return view('penggunting.data_pesanan', compact('dataPesanan'));
    }




}
