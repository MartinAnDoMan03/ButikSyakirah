<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Http\Requests\StoreStockRequest;
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
        //
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
        ]);

        Stock::create([
            'stock_type' => $request->input('stock_type'),
            'stock_name' => $request->input('stock_name'),
            'quantity' => $request->input('quantity'),
            'last_updated' => Carbon::now(), // Tanggal hari ini otomatis
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
