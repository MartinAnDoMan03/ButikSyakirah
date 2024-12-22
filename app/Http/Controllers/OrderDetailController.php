<?php

namespace App\Http\Controllers;

use App\Models\Order_detail;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Requests\StoreOrder_detailRequest;
use App\Http\Requests\UpdateOrder_detailRequest;

class OrderDetailController extends Controller
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
    public function addDetail(Request $request, $order_id)
{
    // Log data mentah yang diterima dari form
    \Log::info('Data diterima:', $request->all());

    $validated = $request->validate([
        'order_type' => 'required|string|max:255',
        'customer_cloth' => 'nullable|string|max:255',
        'store_cloth_type' => 'nullable|string|max:255',
        'store_cloth_length' => 'nullable|numeric',
        'sequin' => 'required|string|max:255|min:0',
        'note' => 'nullable|string',
    ]);

    // Log data setelah validasi
    \Log::info('Data setelah validasi:', $validated);

    // Konversi harga
    $validated['price'] = $request->input('price', 0); // Tidak perlu konversi tambahan
 $validated['order_id'] = $order_id;

    // Simpan data dan log hasilnya
    try {
        $orderDetail = Order_detail::create($validated);
        \Log::info('Data berhasil disimpan:', $orderDetail->toArray());
    } catch (\Exception $e) {
        \Log::error('Error saat menyimpan data: ' . $e->getMessage());
        return back()->withErrors('Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
    }

    return redirect()->route('kasir.data_pesanan')->with('success', 'Detail berhasil ditambahkan.');
}



    /**
     * Display the specified resource.
     */
    public function show(Order_detail $order_detail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($order_id)
    {
        $order = Order::findOrFail($order_id); // Pastikan $order_id tersedia
        return view('kasir.detail_pesanan', compact('order'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrder_detailRequest $request, Order_detail $order_detail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order_detail $order_detail)
    {
        //
    }
}
