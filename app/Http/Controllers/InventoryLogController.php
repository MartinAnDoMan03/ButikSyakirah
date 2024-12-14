<?php

namespace App\Http\Controllers;

use App\Models\Inventory_log;
use App\Http\Requests\StoreInventory_logRequest;
use App\Http\Requests\UpdateInventory_logRequest;

class InventoryLogController extends Controller
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
    public function store(StoreInventory_logRequest $request)
    {
        Inventory_Log::create([
            'stock_id' => $request->input('stock_id'),
            'reference_type' => $request->input('reference_type'),
            'order_reference_id' => $request->input('order_reference_id'),
            'supplier_reference_id' => $request->input('supplier_reference_id'),
            'transaction_type' => $request->input('transaction_type'),
            'quantity' => $request->input('quantity'),
            'transaction_date' => now()->toDateString(), 
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Inventory_log $inventory_log)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inventory_log $inventory_log)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInventory_logRequest $request, Inventory_log $inventory_log)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inventory_log $inventory_log)
    {
        //
    }
}
