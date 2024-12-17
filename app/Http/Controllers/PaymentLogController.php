<?php

namespace App\Http\Controllers;

use App\Models\Payment_log;
use App\Models\Order;
use App\Http\Requests\StorePayment_logRequest;
use App\Http\Requests\UpdatePayment_logRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;
class PaymentLogController extends Controller
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
        $orders = Order::all();

        // Kirim data suppliers ke view
        return view('kasir.payment', compact('orders'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validasi input
    $validatedData = $request->validate([
        'order_id' => 'required|integer|exists:orders,order_id',
        'payment_amount' => 'required|integer',
        'payment_method' => 'required|string|in:Cash,Bank Transfer',
    ]);

    // Simpan data ke tabel payment_logs
    $payment_log = Payment_log::create([
        'order_id' => $validatedData['order_id'], // Tambahkan order_id
        'payment_amount' => $validatedData['payment_amount'],
        'payment_date' => Carbon::now(), // Simpan tanggal pembayaran
        'payment_method' => $validatedData['payment_method'],
    ]);

    // Redirect atau memberikan response
    return redirect()->back()->with('success', 'Payment added successfully!');
}

    /**
     * Display the specified resource.
     */
    public function show(Payment_log $payment_log)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment_log $payment_log)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePayment_logRequest $request, Payment_log $payment_log)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment_log $payment_log)
    {
        //
    }
}
