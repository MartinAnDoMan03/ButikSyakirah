<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Supplier;
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
        //
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
    }



    public function deductStock(Request $request, $stockId)
    {
        $stock = Stock::find($stockId);

        // Deduct 10 units
        $stock->update([
            'quantity' => $stock->quantity - 10,
        ]);

        return response()->json(['message' => 'Stock deducted successfully!', 'stock' => $stock]);
    }

    public function addStock(Request $request)
    {
        $stock = Stock::create([
            'stock_type' => 'cloth',
            'stock_name' => 'Cotton Fabric',
            'quantity' => 50,
        ]);

        return response()->json(['message' => 'Stock added successfully!', 'stock' => $stock]);
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


}