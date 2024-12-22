<?php

namespace App\Http\Controllers;

use App\Models\Sequin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SequinController extends Controller
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
    public function store(Request $request)
    {

        Sequin::create([
            'order_id' => $request->input('form_name'),
            'sequin_name' => $request->input('form_name'),
            'sequin_price' => $request->input('form_name'),
            'seamer_name' => $request->input('form_name'),
            'seam_size' => $request->input('form_name'),
            'seam_price' => $request->input('form_name')
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Sequin $sequin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sequin $sequin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */

public function getOrdersWithSequin()
{
    $user = Auth::user();

    // Check if the logged-in user has the role 'pemayet'
    if ($user->role !== 'pemayet' && $user->role !== 'admin') {
        abort(403, 'Unauthorized action.');
    }

    $orders = \DB::table('sequiner_view')
    ->where('sequiner_id', $user->id)
    ->where('status', 'diproses')
    ->where('sequin_status', 'yes')
    ->get();

    return view('pemayet.data_pesanan', ['orders' => $orders]);
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sequin $sequin)
    {
        //
    }
    public function updateStatus(Request $request, $orderId)
    {
        // Validate the request
        $request->validate([
            'status' => 'required|in:Selesai',
        ]);

        $order = Sequin::findOrFail($orderId);
        $order->status = $request->status;
        $order->save();

        return redirect()->back()->with('success', 'Order status updated successfully!');
    }
}
