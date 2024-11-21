@extends('layouts.layoutadmin')

@section('title', 'Stok Barang')

@section('content')

    <h1>Daftar Stok Barang</h1>

    <!-- Form Input untuk Menambah Stok Barang Baru -->
    <div class="order-form">
        <h3>Tambah Stok Barang Baru</h3>
        <form id="addStockForm">
            <label for="stockName">Nama Barang:</label>
            <input type="text" id="stockName" required>
        
            <label for="stockQuantity">Jumlah Stok:</label>
            <input type="number" id="stockQuantity" step="any" required>
        
            <label for="entryDate">Tanggal Masuk:</label>
            <input type="date" id="entryDate" required>
        
            <button type="submit">Tambahkan Stok</button>
        </form>                
    </div>

    <!-- Tabel Stok Barang -->
    <div class="search-container">
        <input type="text" placeholder="Search..." class="search-input">
        <button class="search-icon"><i class="zmdi zmdi-search"></i></button>
    </div>       
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Barang ID</th>
                    <th>Nama Barang</th>
                    <th>Jumlah Stok (Meter)</th>
                    <th>Tanggal Masuk</th>
                </tr>
            </thead>
            <tbody id="stockTableBody">
                <!-- Baris stok barang akan ditambahkan di sini -->
            </tbody>
        </table>
    </div>

</div>

@endsection