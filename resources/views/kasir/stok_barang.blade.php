@extends('layouts.layout')

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
        <form action="{{ route('stock.store') }}" method="POST">
            @csrf
            <label for="supplier_id">Supplier:</label>
            <select id="supplier_id" name="supplier_id" required>
                <option value="" selected disabled>Pilih Supplier</option>
                @foreach ($suppliers as $supplier)
                    <option value="{{ $supplier->supplier_id }}">{{ $supplier->supplier_name }}</option>
                @endforeach
            </select>

            <label for="stock_type">Jenis Barang:</label>
            <select id="stock_type" name="stock_type" required>
                <option value="" selected disabled>Pilih jenis barang</option>
                <option value="cloth">Kain</option>
                <option value="thread">Benang</option>
            </select>

            <label for="stock_name">Nama Barang:</label>
            <input type="text" id="stock_name" name="stock_name" required>

            <label for="quantity">Jumlah Stok:</label>
            <input type="number" id="quantity" name="quantity" step="1" required>

            <button type="submit">Tambahkan stok</button>
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
