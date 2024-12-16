<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use Illuminate\Http\Request;
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

    public function addPesanan()
{
    // Ambil data customer dari database
    $customers = Customer::all(); 

    // Kirim data ke view
    return view('kasir.add_pesanan', compact('customers'));
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'customer_id' => 'required|exists:customers,customer_id',
        'orderDate' => 'required|date',
        'finishDate' => 'nullable|date|after_or_equal:orderDate',
    ]);
    
    Order::create([
        'customer_id' => $validated['customer_id'],
        'order_date' => $validated['orderDate'],
        'completion_date' => $validated['finishDate'],
        'status' => $request->input('status', 'Diproses') 
    ]);
    
    return redirect()->route('kasir.data_pesanan')->with('success', 'Pesanan berhasil ditambahkan.');
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