<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        return view('orders.data_pesanan', compact('orders'));
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
    public function store(StoreOrderRequest $request)
    {
        $order = Order::create([
            'customer_id' => $request->input('customerID'),
            'order_date' => now()->toDateString(),
            'completion_date' => $request->input('finishDate'),
            'status' => $request->input('status')
        ]);
        return redirect()->route('orders.add_detail', ['id' => $order->id]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        // return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        // 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        $validated = $request->validate([
            'customer_id' => 'required|integer|exists:customers,id',
            'order_date' => 'required|date',
            'completion_date' => 'nullable|date|after_or_equal:order_date',
            'total_price' => 'required|numeric|min:0',
            'status' => 'required|string|max:255',
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }

    public function createFaktur($orderId)
    {
        $order = Order::find($orderId);


        return view('kasir.faktur', compact('order'));
    }
}