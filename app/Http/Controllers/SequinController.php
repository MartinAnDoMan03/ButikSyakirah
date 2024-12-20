<?php

namespace App\Http\Controllers;

use App\Models\Sequin;
use Illuminate\Http\Request;

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
    public function update(Request $request, Sequin $sequin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sequin $sequin)
    {
        //
    }
}
