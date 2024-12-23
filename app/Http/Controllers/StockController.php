<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Supplier;
use App\Models\Order;
use App\Http\Requests\StoreStockRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UpdateStockRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil data supplier dan stok barang
        $suppliers = Supplier::all();
        $stocks = Stock::all();

        // Kirim data ke view stok_barang.blade.php
        return view('kasir.stok_barang', compact('suppliers', 'stocks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil semua data suppliers dari database
        $suppliers = Supplier::all();

        // Kirim data suppliers ke view
        return view('kasir.stok_barang', compact('suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'stock_type' => 'required|string|in:cloth,thread',
            'stock_name' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'supplier_id' => 'required|integer|exists:suppliers,supplier_id',
        ]);

        $stock = Stock::create([
            'stock_type' => $request->input('stock_type'),
            'stock_name' => $request->input('stock_name'),
            'quantity' => $request->input('quantity'),
            'last_updated' => Carbon::now(),
        ]);

        DB::table('stock_suppliers')->insert([
            'stock_id' => $stock->stock_id,
            'supplier_id' => $validatedData['supplier_id'],
        ]);
        // Redirect atau memberi response
        return redirect()->back()->with('success', 'Stock added successfully!');
    }
    /**
     * Display the specified resource.
     */
    public function show(Stock $stock)
    {
        //
    }

    public function getStocks()
    {
        $stocks = Stock::all();
        $suppliers = Supplier::all();
        return view('kasir.stok_barang', ['stocks' => $stocks], ['suppliers' => $suppliers]);
        // return view('admin.stok_barang', ['stocks' => $stocks], ['suppliers' =>$suppliers]);
    }

    public function updateStocks(Request $request)
    {
        $validatedData = $request->validate([
            'stock_id' => 'required|integer|exists:stocks,stock_id',
            'additional_quantity' => 'required|integer|min:1',
        ]);

        // Find the stock and update the quantity
        $stock = Stock::findOrFail($validatedData['stock_id']);
        $stock->quantity += $validatedData['additional_quantity'];
        $stock->last_updated = now();
        $stock->save();

        return redirect()->back()->with('success', 'Stock updated successfully!');
    }

    public function getStockData()
    {
        $stockTypes = \DB::table('stocks')->distinct()->pluck('stock_type');
        $stocks = \DB::table('stocks')->get(['stock_type', 'stock_name']);

        return view('pekerja.ambil_stock', compact('stockTypes', 'stocks'));
    }

    public function getStockNames(Request $request)
    {
        $stockNames = \DB::table('stocks')
            ->where('stock_type', $request->type)
            ->pluck('stock_name');

        return response()->json($stockNames);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stock $stock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStockRequest $request, Stock $stock)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stock $stock)
    {
        //
    }


    public function searchStockAdmin(Request $request)
    {
        $query = $request->query('query'); // Ambil parameter pencarian dari URL

        // Filter data jika ada input pencarian berdasarkan nama barang
        if ($query) {
            $stocks = Stock::where('stock_name', 'LIKE', '%' . $query . '%')->get();
        } else {
            $stocks = Stock::all(); // Tampilkan semua data jika tidak ada input
        }

        // Ambil data supplier untuk dropdown
        $suppliers = Supplier::all();

        // Return tampilan untuk admin
        return view('admin.stokBarang', compact('stocks', 'suppliers'));
    }

    public function searchStockKasir(Request $request)
    {
        $query = $request->query('query'); // Ambil parameter pencarian dari URL

        // Filter data jika ada input pencarian berdasarkan nama barang
        if ($query) {
            $stocks = Stock::where('stock_name', 'LIKE', '%' . $query . '%')->get();
        } else {
            $stocks = Stock::all(); // Tampilkan semua data jika tidak ada input
        }

        // Ambil data supplier untuk dropdown
        $suppliers = Supplier::all();

        // Return tampilan untuk kasir
        return view('kasir.stok_barang', compact('stocks', 'suppliers'));
    }

    public function deductStock(Request $request)
{
    $validatedData = $request->validate([
        'order_id' => 'required|integer|exists:orders,order_id',
        'stock_id' => 'required|integer|exists:stocks,stock_id',
        'quantity' => 'required|integer|min:1',
    ]);

    $stock = Stock::findOrFail($validatedData['stock_id']);

    // Check if there's enough stock to deduct
    if ($stock->quantity < $validatedData['quantity']) {
        return redirect()->back()->withErrors(['error' => 'Jumlah stok tidak mencukupi.']);
    }

    // Deduct stock
    $stock->quantity -= $validatedData['quantity'];
    $stock->last_updated = now();
    $stock->save();

    // Insert into inventory_logs
    DB::table('inventory_logs')->insert([
        'stock_id' => $validatedData['stock_id'],
        'reference_type' => 'Order',
        'order_reference_id' => $validatedData['order_id'],
        'transaction_type' => 'Deduction',
        'quantity' => $validatedData['quantity'],
        'transaction_date' => now(),
    ]);

    return redirect()->back()->with('success', 'Stock berhasil dikurangi dan log dimasukkan.');
}

public function updateStock()
{
    // Return the view for the stock update page.
    return view('pemayet.stock_update');
}

public function updateStockPenjahit()
{
    // Return the view for the stock update page.
    return view('penjahit.stock_update');
}


}