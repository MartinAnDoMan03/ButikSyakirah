<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\AuthController;
use App\Models\Customer;

Route::get('/', function () {
    return view('welcome');    
});

Route::get('pesanan', function () {
    return view('pesanan');
});

Route::get('/kasir/data_customer', function () {

    // $customers = Customer::all();
    // return view('kasir.data_customer', ['customers' => $customers]);
    return view('kasir.data_customer');
});

// login regist

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/kasir/data_customer', [KasirController::class, 'showCustomer'])->name('kasir.data_customer');


Route::get('/kasir/data_pesanan', function () {return view('data_pesanan');})->name('kasir.data_pesanan');
