<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use App\Models\Size_detail;
use Illuminate\Http\Request;
use App\Http\Requests\StoreOrderRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UpdateOrderRequest;
use Barryvdh\DomPDF\Facade\Pdf;

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
    public function edit($order_id)
    {
        $order = Order::findOrFail($order_id);

        return view('kasir.edit_pesanan', compact('order'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $order_id)
    {
        $validated = $request->validate([
            'customer_id' => 'required|integer|exists:customers,customer_id',
            'order_date' => 'required|date',
            'completion_date' => 'nullable|date|after_or_equal:order_date',
            'status' => 'required|string|max:255',
        ]);

        // Find the order by its primary key
        $order = Order::findOrFail($order_id);

        // Update the order details
        $order->update($validated);

        // Redirect or return a response
        return redirect()->route('kasir.data_pesanan')->with('success', 'Order updated successfully!');
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


    public function generateOrderReport(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);
        
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        
        $orders = DB::select('CALL GenerateOrderReport(?, ?)', [$start_date, $end_date]);

        if ($request->has('print_pdf')) {
            $pdf = Pdf::loadView('kasir.order_report_pdf', compact('orders', 'start_date', 'end_date'));
            return $pdf->download('Order_Report_' . now()->format('Ymd') . '.pdf');
        }

        return view('kasir.order_report', compact('orders', 'start_date', 'end_date'));
    }


    public function getSizeDetails($order_id)
    {
        $sizes = Size_detail::where('order_id', $order_id)->first();

        if (!$sizes) {
            return response()->json(['message' => 'No sizes found'], 404);
        }

        return response()->json([
            'lingkar_dada' => $sizes->chest_circumference,
            'lingkar_pinggang' => $sizes->waist_circumference,
            'lingkar_lengan' => $sizes->arm_circumference,
            'panjang_tangan' => $sizes->arm_length,
            'lebar_bahu' => $sizes->shoulder_width,
            'pinggul' => $sizes->pinggul,
            'lingkar_pergelangan' => $sizes->lingkar_pergelangan,
            'panjang_baju' => $sizes->panjang_baju,
        ]);
    }

    public function generateSalesReport(Request $request)
{
    $request->validate([
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
    ]);

    $start_date = $request->input('start_date');
    $end_date = $request->input('end_date');

    // Call the procedure to get the report
    $orders = DB::select('CALL GenerateSalesReport(?, ?)', [$start_date, $end_date]);

    // Get the total sales using the stored function
    $total_sales = DB::selectOne('SELECT CalculateTotalSales(?, ?) AS TotalSales', [$start_date, $end_date])->TotalSales;

    // Handle PDF generation if requested
    if ($request->has('print_pdf')) {
        $pdf = Pdf::loadView('kasir.sales_report_pdf', compact('orders', 'start_date', 'end_date', 'total_sales'));
        return $pdf->download('Sales_Report_' . now()->format('Ymd') . '.pdf');
    }

    // Return the view with the report data
    return view('kasir.sales_report', compact('orders', 'start_date', 'end_date', 'total_sales'));
}



}