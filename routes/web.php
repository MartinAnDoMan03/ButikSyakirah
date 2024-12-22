<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PengguntingController;
use App\Http\Controllers\SeamController;
use App\Http\Controllers\SequinController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PaymentLogController;
use App\Http\Controllers\SizeDetailController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/kasir/detail_ukuran', function () {
    return view('/kasir/detail_ukuran');
});

Route::get('/kasir/supplier', function () {
    return view('/kasir/supplier');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Rute dashboard berdasarkan role
Route::get('/penggunting/data-pesanan', [PengguntingController::class, 'penggunting'])->name('penggunting.data_pesanan');
Route::get('/penjahit/data_pesanan', [SeamController::class, 'getOrdersWithSeam'])->name('seamer.orders');
Route::get('/pemayet/data_pesanan', [SequinController::class, 'getOrdersWithSequin'])->name('sequiner.orders');
Route::put('/update-status-seam/{order_id}', [SeamController::class, 'updateStatus'])->name('seam.update_status');
Route::put('/update-status-sequin/{order_id}', [SequinController::class, 'updateStatus'])->name('sequin.update_status');

// Route for the form page
Route::get('/stock/form', [StockController::class, 'getStockData'])->name('stock.form');

// Route for filtering stock names
Route::post('/stock/names', [StockController::class, 'getStockNames'])->name('stock.names');



// Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register'])->name('register');

Route::post('logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/admin/pengguna', [AdminController::class, 'pengguna'])->name('admin.pengguna');
Route::put('/admin/pengguna', [AdminController::class, 'updateUser'])->name('user.update');
Route::get('/admin/riwayatPesanan', [AdminController::class, 'riwayatPesanan'])->name('admin.riwayatPesanan');
Route::get('/admin/stokBarang', [AdminController::class, 'stokBarang'])->name('admin.stokBarang');
Route::post('/admin/stokBarang', [AdminController::class, 'store'])->name('admin.store');
Route::get('/admin/stok_barang/create', [StockController::class, 'create'])->name('stock.create');
Route::put('/admin/update_stock', [StockController::class, 'updateStocks'])->name('stocks.update');
Route::post('/admin/supplier', [AdminController::class, 'addSupplier'])->name('admin.supplier');
Route::get('/admin/supplier', [AdminController::class, 'showSupplier'])->name('admin.data');
Route::get('/admin/customer', [AdminController::class, 'customer'])->name('admin.customer');
Route::get('/admin/inventory_log', [AdminController::class, 'inventory_log'])->name('admin.inventory_log');
Route::get('/admin/payment_log', [AdminController::class, 'payment_log'])->name('admin.payment_log');
Route::get('/admin/order_log', [AdminController::class, 'order_log'])->name('admin.order_log');


Route::get('/kasir/data_customer', [KasirController::class, 'showCustomer'])->name('kasir.data_customer');
Route::get('/kasir/data_pesanan', [KasirController::class, 'showDataPesanan'])->name('kasir.data_pesanan');
Route::post('/kasir/data_pesanan', [KasirController::class, 'addDetail'])->name('kasir.addDetail');
Route::get('/kasir/stok_barang', [KasirController::class, 'showStockBarang'])->name('kasir.stok_barang');
Route::get('/kasir/add_pesanan', [KasirController::class, 'addPesanan'])->name('kasir.add_pesanan');
Route::post('/kasir/add_pesanan', [KasirController::class, 'store'])->name('kasir.store');
Route::get('/kasir/riwayat_pesanan', [KasirController::class, 'showRiwayat'])->name('kasir.riwayat_pesanan');
Route::post('/kasir/stok_barang', [StockController::class, 'store'])->name('stock.store');
Route::put('/kasir/update_stock', [StockController::class, 'updateStocks'])->name('stocks.update');
Route::get('/kasir/stok_barang/create', [StockController::class, 'create'])->name('stock.create');
Route::post('/kasir/supplier', [SupplierController::class, 'store'])->name('supplier.store');
Route::get('/kasir/supplier', [SupplierController::class, 'showSupplier'])->name('supplier.data');
Route::post('/kasir/payment', [PaymentLogController::class, 'store'])->name('payment.store');
Route::get('/kasir/payment', [PaymentLogController::class, 'create'])->name('payment.create');
Route::post('/kasir/size_detail', [SizeDetailController::class, 'store'])->name('size_detail.store');

// Untuk kasir
Route::get('/kasir/search-customer', [CustomerController::class, 'searchCustomer'])->name('kasir.search.customer')->defaults('role', 'kasir');
Route::get('/search-pesanan', [OrderController::class, 'searchPesanan'])->name('search.pesanan');
Route::get('/search/supplier', [SupplierController::class, 'search'])->name('search.supplier');
Route::get('/kasir/stok/search', [StockController::class, 'searchStockKasir'])->name('search.stok.kasir');



// Untuk admin
Route::get('/admin/search-customer', [CustomerController::class, 'searchCustomer'])->name('admin.search.customer')->defaults('role', 'admin');
Route::get('/stok/search', [StockController::class, 'search'])->name('stok.search');
Route::get('/admin/stok/search', [StockController::class, 'searchStockAdmin'])->name('search.stok.admin');
Route::get('/admin/supplier/search', [SupplierController::class, 'searchAdmin'])->name('search.supplier.admin');









Route::get('/penggunting/home', function () {
    return view('penggunting.home'); });
Route::get('/penggunting/detail_ukuran', function () {
    return view('penggunting.detail_ukuran'); });
Route::get('/penggunting/data_pesanan', function () {
    return view('penggunting.data_pesanan'); });

Route::post('/kasir/add_pesanan', [CustomerController::class, 'store'])->name('customer.store');

Route::get('/kasir/add_pesanan', [CustomerController::class, 'getCustomers']);
Route::get('/edit-pesanan/{order_id}', [OrderController::class, 'edit'])->name('orders.edit');
Route::put('/edit-pesanan/{order_id}', [OrderController::class, 'update'])->name('orders.update');

Route::get('/kasir/detail-ukuran/{order_id}', [OrderController::class, 'getSizeDetails']);

// route order
// Route::get('/orders/{orderId}/faktur', [OrderController::class, 'createFaktur'])->name('faktur');
Route::post('/kasir/add_pesanan/order_store', [OrderController::class, 'store'])->name('order.store');
Route::get('/order/add_details/{id}', [OrderController::class, 'add_detail'])->name('order.add_detail');
// Route::get('/orders/{orderId}/faktur', [OrderController::class, 'createFaktur'])->name('createFaktur');
Route::get('/generate-order-report', [OrderController::class, 'generateOrderReport'])->name('report.generate');
Route::get('/detail-ukuran/{order_id}', [OrderController::class, 'getSizeDetails'])->name('sizeDetails.get');
Route::get('/kasir/order_report', function () {
    return view('kasir.order_report');
})->name('order.report');

Route::get('/kasir/sales_report', function () {
    return view('kasir.sales_report');
})->name('sales.report');
Route::get('/generate-sales-report', [OrderController::class, 'generateSalesReport'])->name('sales.report.generate');
