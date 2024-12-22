<?php

namespace App\Http\Controllers;

use App\Models\Seam;
use App\Http\Requests\StoreSeamRequest;
use App\Http\Requests\UpdateSeamRequest;
use Illuminate\Support\Facades\Auth;


class SeamController extends Controller
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
    public function store(StoreSeamRequest $request)
    {
        Seam::create([
            'order_id' => $request->input('form_name'),
            'seam_name' => $request->input('form_name'),
            'cloth_type' => $request->input('form_name'),
            'seamer_name' => $request->input('form_name'),
            'seam_size' => $request->input('form_name'),
            'seam_price' => $request->input('form_name')
        ]);
    }

    public function getOrdersWithSeam()
{
    $user = Auth::user();

    // Check if the logged-in user has the role 'pemayet'
    if ($user->role !== 'penjahit' && $user->role !== 'admin') {
        abort(403, 'Unauthorized action.');
    }

    // Query the orders and sequin tables
    $orders = \DB::table('seamer_view')
    ->where('seam_status', 'diproses')
    ->where('seamer_id', $user->user_id)
    ->get();

    return view('penjahit.data_pesanan', ['orders' => $orders]);
}

    /**
     * Display the specified resource.
     */
    public function show(Seam $seam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Seam $seam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSeamRequest $request, Seam $seam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Seam $seam)
    {
        //
    }
}
