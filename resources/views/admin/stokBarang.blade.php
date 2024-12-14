@extends('layouts.layoutadmin')

@section('title', 'Stok Barang')

@section('content')

    <h1>Daftar Stok Barang</h1>

    <!-- Tombol Toggle -->
    <div class="add-stock-container">
        <!-- <button id="showTableButton">Lihat Tabel Barang</button> -->
        <button id="showFormButton">Tambah Barang Baru</button>
    </div>

    <!-- Form Input untuk Menambah Stok Barang Baru -->
    <div class="order-form" id="addStockForm" style="display: none;">
        <h3>Tambah Stok Barang Baru</h3>
        <form id="addStockForm">

            <label for="stockType">Jenis Barang:</label>
            <select id="stockType" required>
                <option value="kain">Kain</option>
                <option value="benang">Benang</option>
            </select>

            <label for="stockName">Nama Barang:</label>
            <input type="text" id="stockName" required>
        
            <label for="quantityLabel" id="quantityLabel">Jumlah Stok:</label>
            <input type="number" id="stockQuantity" step="any" required>
        
            <label for="entryDate">Tanggal Masuk:</label>
            <input type="date" id="entryDate" required>
        
            <button type="submit">Tambahkan Stok</button>
        </form>                
    </div>

    <!-- Tabel Stok Barang -->
    <div class="search-container" id="stockTable">
        <input type="text" placeholder="Search..." class="search-input">
        <button class="search-icon"><i class="zmdi zmdi-search"></i></button>
    </div>       
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Barang ID</th>
                    <th>Nama Barang</th>
                    <th>Jumlah Stok</th>
                    <th>Tanggal Masuk Terakhir</th>
                </tr>
            </thead>
            <tbody id="stockTableBody">
                <!-- Baris stok barang akan ditambahkan di sini -->
                @foreach ($stocks as $stock)
                <tr>
                <td>{{$stock->stock_id}}</td>
                <td>{{$stock->stock_name}}</td>
                <td>{{$stock->quantity}}</td>
                <td>{{$stock->last_updated}}</td>
            </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

@endsection