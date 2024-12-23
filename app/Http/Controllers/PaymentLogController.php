<?php

namespace App\Http\Controllers;

use App\Models\Payment_Log; // Ensure consistent naming for the model
use App\Models\Order;
use App\Models\Order_detail;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PaymentLogController extends Controller
{
    /**
     * Display a listing of the payment logs.
     */
    public function index()
    {
        $paymentLogs = Payment_Log::with('order')->get(); // Include related orders for better context
        return view('kasir.payment_logs_index', compact('paymentLogs'));
    }

    /**
     * Show the form for creating a new payment log.
     */
    public function create()
    {
        $orders = Order_detail::all();
        return view('kasir.payment', compact('orders'));
    }

    /**
     * Store a newly created payment log in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'order_id' => 'required|integer|exists:orders,order_id',
            'payment_amount' => 'required|integer|min:1',
            'payment_method' => 'required|string|in:Cash,Bank Transfer',
        ]);
    
        try {
            // Directly log the payment
            Payment_Log::create([
                'order_id' => $validatedData['order_id'],
                'payment_amount' => $validatedData['payment_amount'],
                'remaining_payment' => 0, 
                'payment_date' => now(),
                'payment_method' => $validatedData['payment_method'],
            ]);
    
            return redirect()->route('kasir.payment')->with('success', 'Payment added successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Failed to add payment. ' . $e->getMessage()]);
        }
    }

    /**
     * Display the specified payment log.
     */
    public function show(Payment_Log $paymentLog)
    {
        return view('kasir.payment_log_show', compact('paymentLog'));
    }

    /**
     * Show the form for editing the specified payment log.
     */
    public function edit(Payment_Log $paymentLog)
    {
        return view('kasir.payment_log_edit', compact('paymentLog'));
    }

    /**
     * Update the specified payment log in storage.
     */
    public function update(Request $request, Payment_Log $paymentLog)
    {
        $validatedData = $request->validate([
            'payment_amount' => 'required|integer|min:1',
            'payment_method' => 'required|string|in:Cash,Bank Transfer',
        ]);

        $paymentLog->update($validatedData);

        return redirect()->route('payment_logs.index')->with('success', 'Payment log updated successfully!');
    }

    /**
     * Remove the specified payment log from storage.
     */
    public function destroy(Payment_Log $paymentLog)
    {
        try {
            $paymentLog->delete();
            return redirect()->route('payment_logs.index')->with('success', 'Payment log deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Failed to delete payment log. ' . $e->getMessage()]);
        }
    }
}