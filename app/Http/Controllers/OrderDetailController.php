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
    // Log raw data received from the form
    \Log::info('Data diterima:', $request->all());

    // Validate incoming request
    $validated = $request->validate([
        'order_type' => 'required|string|max:255',
        'customer_cloth' => 'nullable|string|max:255',
        'store_cloth_type' => 'nullable|string|max:255',
        'store_cloth_length' => 'nullable|numeric',
        'sequin' => 'required|string|max:255|min:0',
        'note' => 'nullable|string',
    ]);

    // Log validated data
    \Log::info('Data setelah validasi:', $validated);

    // Convert and calculate prices
    $validated['sequin_price'] = $request->input('sequin_price', 0); // Get the sequin price
    $validated['seam_price'] = $this->getSeamPriceBasedOnOrderType($validated['order_type']);
    $validated['price'] = $this->calculateTotalPrice($validated['order_type'], $validated['store_cloth_type'], $validated['store_cloth_length'], $validated['sequin_price']);
    $validated['order_id'] = $order_id;

    // Save data to the database
    try {
        $orderDetail = Order_detail::create($validated);
        \Log::info('Data berhasil disimpan:', $orderDetail->toArray());
    } catch (\Exception $e) {
        \Log::error('Error saat menyimpan data: ' . $e->getMessage());
        return back()->withErrors('Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
    }

    
    $userId = auth()->user()->user_id; 
    $jobType = 'cutting'; 
    $startDate = now()->toDateString(); // 

    \DB::statement('CALL InsertJob(?, ?, ?)', [
        $userId,
        $jobType,
        $startDate
    ]);

    $userId = auth()->user()->id; // Assuming the user is authenticated
        $jobType = 'seaming'; // Example job type
        $startDate = now()->toDateString(); // Current date

        \DB::statement('CALL InsertJob(?, ?, ?)', [
            $userId,
            $jobType,
            $startDate
        ]);

    return redirect()->route('kasir.data_pesanan')->with('success', 'Detail berhasil ditambahkan.');
}

private function getSeamPriceBasedOnOrderType($orderType)
{
    // Seam price logic based on order type
    switch ($orderType) {
        case 'kemeja-lengan-panjang-pria':
            return 100000;
        case 'kemeja-lengan-pendek-pria':
            return 80000;
        case 'gamis-wanita':
            return 120000;
        case 'rok-panjang-wanita':
            return 90000;
        case 'rok-pendek-wanita':
            return 75000;
        case 'kebaya':
            return 150000;
        case 'kemeja-lengan-panjang-anak':
            return 70000;
        case 'kemeja-lengan-pendek-anak':
            return 60000;
        case 'gamis-anak':
            return 100000;
        case 'jas':
            return 200000;
        case 'custom':
            return 0;
        default:
            return 0;
    }
}

private function calculateTotalPrice($orderType, $storeClothType, $storeClothLength, $sequinPrice)
{
    $prices = [
        "kemeja-lengan-panjang-pria" => 100000,
        "kemeja-lengan-pendek-pria" => 80000,
        "gamis-wanita" => 120000,
        "rok-panjang-wanita" => 90000,
        "rok-pendek-wanita" => 75000,
        "kebaya" => 150000,
        "kemeja-lengan-panjang-anak" => 70000,
        "kemeja-lengan-pendek-anak" => 60000,
        "gamis-anak" => 100000,
        "jas" => 200000,
        "custom" => 0
    ];

    $fabricPrices = [
        "katun" => 50000,
        "sutra" => 100000,
        "wolfis" => 75000
    ];

    $basePrice = $prices[$orderType] ?? 0;
    $fabricPricePerMeter = $fabricPrices[$storeClothType] ?? 0;
    $storeClothLength = $storeClothLength ?? 0;

    // Calculate total price
    return $basePrice + ($fabricPricePerMeter * $storeClothLength) + $sequinPrice;
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

    public function showDetailUkuran($order_id)
    {
        // Cari data berdasarkan foreign key order_id
        $order_details = Order_detail::where('order_id', $order_id)->first();

        if (!$order_details) {
            return redirect()->back()->with('error', 'Pesanan tidak ditemukan.');
        }

        // Kirimkan data ke view
        return view('penggunting.detail_ukuran', compact('$order_details'));
    }
}