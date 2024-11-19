<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KasirController;
use App\Models\Customer;

Route::get('/', function () {
    return view('welcome');    
});

Route::get('pesanan', function () {
    return view('pesanan');
});

Route::get('/kasir/data-customer', function () {

    // $customers = Customer::all();
    // return view('kasir.data_customer', ['customers' => $customers]);
    return view('kasir.data_customer');
});

Route::get('/kasir/data-customer', [KasirController::class, 'showCustomer'])->name('kasir.data_customer');

