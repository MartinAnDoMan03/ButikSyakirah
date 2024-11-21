<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class KasirController extends Controller
{
    public function showCustomer()
    {
        // Ambil semua data dari tabel customers
        $customers = Customer::all();

        // Kirim data ke view
        return view('kasir.data_customer', ['customers' => $customers]);
    }

    
}
