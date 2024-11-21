<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class KasirController extends Controller
{
    public function showCustomer()
    {
        // Ambil semua data dari tabel customers
        $customers = Customer::all();

        // Kirim data ke view
        return view('kasir.data_customer', ['customers' => $customers]);
    }

    public function showDataPesanan()
    {
        // $orders = Orders::all();
        return view('kasir.data_pesanan');
    }

    public function showStockBarang()
    {
        // Logika untuk menampilkan stok barang
        return view('kasir.stok_barang');
    }
    
    public function addPesanan()
    {
        // Logika untuk menampilkan stok barang
        return view('kasir.add_pesanan');
    }
    
}
