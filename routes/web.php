<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\AuthController;
use App\Models\Customer;

Route::get('/', function () {
    return view('welcome');    
});

Route::get('pesanan', function () {
    return view('pesanan');
});


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/admin/pengguna', [AdminController::class, 'pengguna'])->name('admin.pengguna');
Route::get('/admin/riwayatPesanan', [AdminController::class, 'riwayatPesanan'])->name('admin.riwayatPesanan');
Route::get('/admin/stokBarang', [AdminController::class, 'stokBarang'])->name('admin.stokBarang');


Route::get('/kasir/data_customer', [KasirController::class, 'showCustomer'])->name('kasir.data_customer');
Route::get('/kasir/data_pesanan', [KasirController::class, 'showDataPesanan'])->name('kasir.data_pesanan');
Route::get('/kasir/stok_barang', [KasirController::class, 'showStockBarang'])->name('kasir.stok_barang');
Route::get('/kasir/add_pesanan', [KasirController::class, 'addPesanan'])->name('kasir.add_pesanan');


