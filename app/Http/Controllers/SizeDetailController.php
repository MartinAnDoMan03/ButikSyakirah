<?php

namespace App\Http\Controllers;

use App\Models\Size_detail;
use App\Models\Order_Detail; // Update the model used for order details
use Illuminate\Http\Request;

class SizeDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // This method can list all size details if needed
        $sizeDetails = Size_detail::all();
        return view('size_details.index', compact('sizeDetails'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Fetch all order details to populate the dropdown
        $order_details = Order_Detail::all();
        return view('penggunting.detail_ukuran', compact('order_details'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming data
        $validatedData = $request->validate([
            'order_detail_id' => 'required|integer|exists:order_details,order_detail_id',
            'chest_circumference' => 'required|numeric|min:0',
            'waist_circumference' => 'required|numeric|min:0',
            'arm_circumference' => 'required|numeric|min:0',
            'arm_length' => 'required|numeric|min:0',
            'shoulder_width' => 'required|numeric|min:0',
            'hip' => 'required|numeric|min:0',
            'wrist_circumference' => 'required|numeric|min:0',
            'clothes_length' => 'required|numeric|min:0',
        ]);

        // Create a new size detail record
        Size_detail::create([
            'order_detail_id' => $validatedData['order_detail_id'],
            'chest_circumference' => $validatedData['chest_circumference'],
            'waist_circumference' => $validatedData['waist_circumference'],
            'arm_circumference' => $validatedData['arm_circumference'],
            'arm_length' => $validatedData['arm_length'],
            'shoulder_width' => $validatedData['shoulder_width'],
            'hip' => $validatedData['hip'],
            'wrist_circumference' => $validatedData['wrist_circumference'],
            'clothes_length' => $validatedData['clothes_length'],
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Size details added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Size_detail $size_detail)
    {
        return view('size_details.show', compact('size_detail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Size_detail $size_detail)
    {
        return view('size_details.edit', compact('size_detail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Size_detail $size_detail)
    {
        // Validate the incoming data
        $validatedData = $request->validate([
            'chest_circumference' => 'required|numeric|min:0',
            'waist_circumference' => 'required|numeric|min:0',
            'arm_circumference' => 'required|numeric|min:0',
            'arm_length' => 'required|numeric|min:0',
            'shoulder_width' => 'required|numeric|min:0',
            'hip' => 'required|numeric|min:0',
            'wrist_circumference' => 'required|numeric|min:0',
            'clothes_length' => 'required|numeric|min:0',
        ]);

        // Update the size detail record
        $size_detail->update($validatedData);

        // Redirect back with a success message
        return redirect()->route('size_details.index')->with('success', 'Size details updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Size_detail $size_detail)
    {
        $size_detail->delete();

        return redirect()->route('size_details.index')->with('success', 'Size details deleted successfully!');
    }

    public function showSizeDetails()
    {
        // Fetch all order details
        $order_details = Order_Detail::all(); // Ensure this model is imported and working correctly
    
        // Pass it to the view
        return view('penggunting.detail_ukuran', compact('order_details'));
    }
    

}
