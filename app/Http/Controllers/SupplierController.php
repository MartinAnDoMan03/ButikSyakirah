<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Http\Requests\StoreSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;
use Illuminate\Http\Request;

class SupplierController extends Controller
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

        $validatedData = $request->validate([
            'supplier_name' => 'required|string|max:255',
            'contact_info' => 'required|string|max:255',
            'address' => 'required|string',
        ]);

        $suppliers = Supplier::create([
            'supplier_name' => $validatedData['supplier_name'],
            'contact_info' => $validatedData['contact_info'],
            'address' => $validatedData['address']
        ]);

        // Redirect atau memberi response
        return redirect()->back()->with('success', 'Stock added successfully!');
    }

    public function showSupplier()
    {
        $suppliers = Supplier::all();
        return view('kasir.supplier' , ['suppliers' => $suppliers]);
    }


    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSupplierRequest $request, Supplier $supplier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        //
    }


    // untuk kasir
    public function search(Request $request)
    {
        $query = $request->input('query'); // Ambil input pencarian dari form
    
        if ($query) {
            // Pencarian berdasarkan nama supplier
            $suppliers = Supplier::where('supplier_name', 'LIKE', '%' . $query . '%')->get();
        } else {
            // Jika tidak ada input, tampilkan semua data
            $suppliers = Supplier::all();
        }
    
        // Kembali ke halaman supplier dengan hasil pencarian
        return view('kasir.supplier', compact('suppliers'));
    }

    public function searchAdmin(Request $request)
    {
    $query = $request->input('query'); // Ambil input pencarian dari form
    
    if ($query) {
        // Pencarian berdasarkan nama supplier
        $suppliers = Supplier::where('supplier_name', 'LIKE', '%' . $query . '%')->get();
    } else {
        // Jika tidak ada input, tampilkan semua data
        $suppliers = Supplier::all();
    }
    
    // Kembali ke halaman admin dengan hasil pencarian
    return view('admin.supplier', compact('suppliers'));
    }

    
    
    
}
