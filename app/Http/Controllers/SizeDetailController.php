<?php

namespace App\Http\Controllers;

use App\Models\Size_detail;
use App\Http\Requests\StoreSize_detailRequest;
use App\Http\Requests\UpdateSize_detailRequest;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSize_detailRequest $request)
    {
        Size_detail::create([
            'order_id' => $request->input('form_name'),
            'waist_circumference' => $request->input('form_name'),
            'arm_circumference' => $request->input('form_name'),
            'body_height' => $request->input('form_name'),
            'shoulder_width' => $request->input('form_name'),
            'chest_circumference' => $request->input('form_name'),
            'arm_length' => $request->input('form_name')
        ]);
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
