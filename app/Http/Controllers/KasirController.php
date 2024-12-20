<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Stock;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\pdf;

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
        $orders = DB::select("
        SELECT orders.*, customers.customer_name as customer_name, order_details.price as price
        FROM orders
        JOIN customers ON orders.customer_id = customers.customer_id LEFT JOIN order_details ON orders.order_id = order_details.order_id
        ");
        return view('kasir.data_pesanan', ['orders' => $orders]);

    }

    public function showStockBarang()
    {

        $stocks = Stock::all();
        return view('kasir.stok_barang', ['stocks' => $stocks]);
    }

    public function addPesanan()
    {
        // Ambil data customer dari database
        $customers = Customer::all();

        // Kirim data ke view
        return view('kasir.add_pesanan', compact('customers'));
    }


    public function showRiwayat()
    {
        // Logika untuk menampilkan riwayat pesanan
        return view('kasir.riwayat_pesanan');
    }




}
