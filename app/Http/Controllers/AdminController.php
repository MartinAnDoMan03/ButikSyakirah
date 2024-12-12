<?php

namespace App\Http\Controllers;
use App\Models\Customer;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Menampilkan halaman Data Pengguna
    public function pengguna()
    {
        return view('admin.pengguna');
    }

    // Menampilkan halaman Riwayat Pesanan
    public function riwayatPesanan()
    {
        return view('admin.riwayatPesanan');
    }

    // Menampilkan halaman Stok Barang
    public function stokBarang()
    {
        return view('admin.stokBarang');
    }
    public function customer()
    {
        $customers = Customer::all();
        return view('admin.customer', ['customers' => $customers]);
    }
}

