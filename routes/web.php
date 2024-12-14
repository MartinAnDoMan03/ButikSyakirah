<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PengguntingController;
use App\Http\Controllers\PenjahitController;
use App\Http\Controllers\PemayetController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('pesanan', function () {
    return view('pesanan');
});


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Rute dashboard berdasarkan role
Route::get('/penggunting/data-pesanan', [PengguntingController::class, 'penggunting'])->name('penggunting.data_pesanan');
Route::get('penjahit/data_pesanan', [PenjahitController::class, 'penjahit'])->name('penjahit.data_pesanan');
Route::get('pemayet/data_pesanan', [PemayetController::class, 'pemayet'])->name('pemayet.data_pesanan');


// Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register'])->name('register');

Route::post('logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/admin/pengguna', [AdminController::class, 'pengguna'])->name('admin.pengguna');
Route::get('/admin/riwayatPesanan', [AdminController::class, 'riwayatPesanan'])->name('admin.riwayatPesanan');
Route::get('/admin/stokBarang', [AdminController::class, 'stokBarang'])->name('admin.stokBarang');
Route::get('/admin/customer', [AdminController::class, 'customer'])->name('admin.customer');


Route::get('/kasir/data_customer', [KasirController::class, 'showCustomer'])->name('kasir.data_customer');
Route::get('/kasir/data_pesanan', [KasirController::class, 'showDataPesanan'])->name('kasir.data_pesanan');
Route::get('/kasir/stok_barang', [KasirController::class, 'showStockBarang'])->name('kasir.stok_barang');
Route::get('/kasir/add_pesanan', [KasirController::class, 'addPesanan'])->name('kasir.add_pesanan');
Route::post('/kasir/add_pesanan', [KasirController::class, 'store'])->name('kasir.store');
Route::get('/kasir/riwayat_pesanan', [KasirController::class, 'showRiwayat'])->name('kasir.riwayat_pesanan');


Route::get('/penggunting/home', function () {
    return view('penggunting.home'); });
Route::get('/penggunting/detail_ukuran', function () {
    return view('penggunting.detail_ukuran'); });
Route::get('/penggunting/data_pesanan', function () {
    return view('penggunting.data_pesanan'); });

Route::post('/kasir/add_pesanan', [CustomerController::class, 'store'])->name('customer.store');

Route::get('/kasir/add_pesanan', [CustomerController::class, 'getCustomers']);

// route order
// Route::get('/orders/{orderId}/faktur', [OrderController::class, 'createFaktur'])->name('faktur');
Route::get('/kasir/add_pesanan', [OrderController::class, 'store'])->name('order.store');
Route::get('/order/add_details/{id}', [OrderController::class, 'add_detail'])->name('order.add_detail');
Route::get('/orders/{orderId}/faktur', [OrderController::class, 'createFaktur'])->name('createFaktur');
