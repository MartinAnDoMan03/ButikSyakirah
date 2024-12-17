@extends('layouts.layout')

@section('title', 'Stok Barang')

@section('content')

    <h1>Daftar Stok Barang</h1>

    <!-- Form Input untuk Menambah Stok Barang Baru -->
    <div class="order-form">
        <h3>Tambah Stok Barang Baru</h3>
        <form action="{{ route('supplier.store') }}" method="POST">
            @csrf

            <label for="supplier_name">Nama supplier:</label>
            <input type="text" id="supplier_name" name="supplier_name" required>

            <label for="contact_info">Info Kontak:</label>
            <input type="text" id="contact_info" name="contact_info" required>

            <label for="address">Alamat:</label>
            <input type="text" id="address" name="address" required>

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
                    <th>Supplier ID</th>
                    <th>Supplier Name</th>
                    <th>Contact Info</th>
                    <th>Alamat</th>
                </tr>
            </thead>
            <tbody id="stockTableBody">
                <!-- Baris stok barang akan ditambahkan di sini -->
                {{-- @foreach ($stocks as $stock)
                <tr>
                <td>{{$stock->stock_id}}</td>
                <td>{{$stock->stock_name}}</td>
                <td>{{$stock->quantity}}</td>
                <td>{{$stock->last_updated}}</td>
            </tr>
                @endforeach --}}
            </tbody>
        </table>
    </div>

    </div>

@endsection
