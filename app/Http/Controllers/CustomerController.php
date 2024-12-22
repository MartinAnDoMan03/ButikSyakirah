<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
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
            'customer_name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255|unique:customers,email',
        ]);

        Customer::create([
            'customer_name' => $request->input('customer_name'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email')
        ]);

        // Redirect atau memberi response
        return redirect()->back()->with('success', 'Customer added successfully!');
    }

    public function getCustomers()
    {
        $customers = Customer::all();
        return view('kasir.add_pesanan' , ['orders' => $customers]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    public function searchCustomer(Request $request, $role)
    {
        $query = $request->query('query'); // Ambil parameter pencarian dari URL
    
        // Filter data jika ada input pencarian
        if ($query) {
            $customers = Customer::where('customer_name', 'LIKE', '%' . $query . '%')->get();
        } else {
            $customers = Customer::all(); // Tampilkan semua data jika tidak ada input
        }
    
        // Tentukan tampilan berdasarkan role
        if ($role === 'kasir') {
            return view('kasir.data_customer', compact('customers'));
        } elseif ($role === 'admin') {
            return view('admin.customer', compact('customers'));
        } else {
            abort(404, 'Role tidak dikenali.');
        }
    }
    
    



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
