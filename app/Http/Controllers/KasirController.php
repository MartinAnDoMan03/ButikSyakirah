<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Order_detail;
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

        $stocks = DB::table('stocks')
        ->join('stock_suppliers', 'stocks.stock_id', '=', 'stock_suppliers.stock_id')
        ->join('suppliers', 'stock_suppliers.supplier_id', '=', 'suppliers.supplier_id')
        ->select('stocks.*', 'suppliers.supplier_name')
        ->get();

        $suppliers = DB::table('suppliers')->select('supplier_id', 'supplier_name')->get();    
        return view('kasir.stok_barang', ['stocks' => $stocks, 'suppliers' => $suppliers]);
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
        $orders = Order::all();
        return view('kasir.riwayat_pesanan', ['orders'=> $orders]);
    }

        public function addDetail(Request $request)
        {
            $validated = $request->validate([
                'order_id' => 'required|exists:orders,order_id',
                'order_type' => 'required|string|max:255',
                'customer_cloth' => 'nullable|string|max:255',
                'store_cloth_type' => 'nullable|string|max:255',
                'store_cloth_length' => 'nullable|numeric',
                'sequin' => 'required|string|max:255',
                'price' => 'nullable|numeric',
                'note' => 'nullable|string',
            ]);

            Order_detail::create([
                'order_id' => $validated['order_id'],
                'order_type' => $validated['order_type'],
                'customer_cloth' => $validated['customer_cloth'],
                'store_cloth_type' => $validated['store_cloth_type'],
                'store_cloth_length' => $validated['store_cloth_length'],
                'sequin' => $validated['sequin'],
                'price' => $validated['price'],
                'note' => $validated['note'],
            ]);

            return redirect()->route('kasir.data_pesanan')->with('success', 'Detail berhasil ditambahkan.');
        }

}