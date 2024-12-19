<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Models\User;
use App\Models\Order;
use App\Models\Stock;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Menampilkan halaman Data Pengguna
    public function pengguna()
    {
        $users = User::all();
        return view('admin.pengguna', ['users' => $users]);
    }

    // Menampilkan halaman Riwayat Pesanan
    public function riwayatPesanan()
    {
        $orders = Order::all();
        return view('admin.riwayatPesanan', ['orders' => $orders]);
    }

    // Menampilkan halaman Stok Barang
    public function stokBarang()
    {
        $stocks = Stock::all();
        return view('admin.stokBarang', ['stocks' => $stocks]);
    }
    public function customer()
    {
        $customers = Customer::all();
        return view('admin.customer', ['customers' => $customers]);
    }

    // Update User
    public function updateUser(Request $request)
{
    $validated = $request->validate([
        'user_id' => 'required|exists:users,user_id',
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone_number' => 'required|string|max:20',
        'role' => 'required|in:kasir,penggunting,penjahit,pemayet',
        'status' => 'required|in:aktif,nonaktif',
    ]);

    // Update user
    $user = User::find($request->user_id);
    $user->name = $request->name;
    $user->email = $request->email;
    $user->phone_number = $request->phone_number;
    $user->role = $request->role;
    $user->status = $request->status;
    $user->save();

    // Redirect kembali ke halaman pengguna dengan pesan sukses
    return redirect()->route('admin.pengguna')->with('success', 'User updated successfully.');
}

}

