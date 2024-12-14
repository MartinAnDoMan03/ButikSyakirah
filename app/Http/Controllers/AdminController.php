<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Models\User;
use App\Models\Order;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Menampilkan halaman Data Pengguna
    public function pengguna()
    {
        $users = User::all();
        return view('admin.pengguna', ['users'=>$users]);
    }

    // Menampilkan halaman Riwayat Pesanan
    public function riwayatPesanan()
    {
        $orders = Order::all();
        return view('admin.riwayatPesanan' , ['orders' => $orders]);
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

