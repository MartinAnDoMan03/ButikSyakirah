<?php

namespace App\Http\Controllers;

use App\Models\Size_detail;
use App\Models\Order;
use App\Http\Requests\StoreSize_detailRequest;
use App\Http\Requests\UpdateSize_detailRequest;
use Illuminate\Http\Request;

class SizeDetailController extends Controller
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
        return view('kasir.size_detail', compact('orders'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSize_detailRequest $request)
    {

        $validatedData = $request->validate([
            'order_id' => 'required|integer|exists:orders,order_id',
            'waist_circumference' => 'required|integer',
            'arm_circumference' => 'required|integer',
            'body_height' => 'required|integer',
            'shoulder_width' => 'required|integer',
            'chest_circumference' => 'required|integer',
            'arm_length' => 'required|integer',
        ]);

        $size_details = Size_detail::create([
            'order_id' => $validatedData['order_id'],
            'waist_circumference' => $validatedData['waist_circumference'],
            'arm_circumference' => $validatedData['arm_circumference'],
            'body_height' => $validatedData['body_height'],
            'shoulder_width' => $validatedData['shoulder_width'],
            'chest_circumference' => $validatedData['chest_circumference'],
            'arm_length' => $validatedData['arm_length'],
        ]);

        // Redirect atau memberikan response
        return redirect()->back()->with('success', 'Payment added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Size_detail $size_detail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Size_detail $size_detail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSize_detailRequest $request, Size_detail $size_detail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Size_detail $size_detail)
    {
        //
    }
}
