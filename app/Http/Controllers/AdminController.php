<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Models\User;
use App\Models\Order;
use App\Models\Stock;
use App\Models\Order_log;
use App\Models\Payment_log;
use App\Models\Inventory_log;
use App\Models\Supplier;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
    $stocks = DB::table('stocks')
    ->join('stock_suppliers', 'stocks.stock_id', '=', 'stock_suppliers.stock_id')
    ->join('suppliers', 'stock_suppliers.supplier_id', '=', 'suppliers.supplier_id')
    ->select('stocks.*', 'suppliers.supplier_name')
    ->get();

    $suppliers = DB::table('suppliers')->select('supplier_id', 'supplier_name')->get();
    return view('admin.stokBarang',[
        'stocks' => $stocks,
        'suppliers' => $suppliers,
    ]);
}

    public function customer()
    {
        $customers = Customer::all();
        return view('admin.customer', ['customers' => $customers]);
    }

    public function inventory_log()
    {
        $inventory_logs = Inventory_log::all();
        return view('admin.inventory_log', ['inventory_logs' => $inventory_logs]);
    }

    public function payment_log()
    {
        $payment_logs = Payment_log::all();
        return view('admin.payment_log', ['payment_logs' => $payment_logs]);
    }

    public function order_log()
    {
        $order_logs = Order_log::all();
        return view('admin.order_log', ['order_logs' => $order_logs]);
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

public function addSupplier(Request $request)
    {

        $validatedData = $request->validate([
            'supplier_name' => 'required|string|max:255',
            'contact_info' => 'required|string|max:255',
            'address' => 'required|string',
        ]);

        $suppliers = Supplier::create([
            'supplier_name' => $request->input('supplier_name'),
            'contact_info' => $request->input('contact_info'),
            'address' => $request->input('address'),
        ]);

        // Redirect atau memberi response
        return redirect()->back()->with('success', 'Stock added successfully!');
    }

public function showSupplier()
{
    $suppliers = Supplier::all();
    return view('admin.supplier' , ['suppliers' => $suppliers]);
}

// Store method
public function store(Request $request)
    {

        $validatedData = $request->validate([
            'stock_type' => 'required|string|in:cloth,thread',
            'stock_name' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'supplier_id' => 'required|integer',
        ]);

        $stock = Stock::create([
            'stock_type' => $validatedData['stock_type'],
            'stock_name' => $validatedData['stock_name'],
            'quantity' => $validatedData['quantity'],
            'last_updated' => Carbon::now(),
        ]);

        DB::table('stock_suppliers')->insert([
            'stock_id' => $stock->stock_id,
            'supplier_id' => $validatedData['supplier_id'],
        ]);
        // Redirect atau memberi response
        return redirect()->back()->with('success', 'Stock added successfully!');
    }

}