@extends('layouts.layout')

@section('title', 'Stok Barang')

@section('content')

    <h1>Daftar Supplier</h1>

    <!-- Form Input untuk Menambah Stok Barang Baru -->
    <div class="order-form">
        <h3>Tambah Supplier Baru</h3>
        <form action="{{ route('supplier.store') }}" method="POST">
            @csrf

            <label for="supplier_name">Nama supplier:</label>
            <input type="text" id="supplier_name" name="supplier_name" required>

            <label for="contact_info">Info Kontak:</label>
            <input type="text" id="contact_info" name="contact_info" required>

            <label for="address">Alamat:</label>
            <input type="text" id="address" name="address" required>

            <button type="submit">Tambahkan Supplier</button>
        </form>
    </div>

    <!-- Tabel Stok Barang -->
    <div class="search-container">
        <form action="{{ route('search.supplier') }}" method="GET">
            <input 
                type="text" 
                name="query" 
                placeholder="Search..." 
                class="search-input" 
                value="{{ request('query') }}">
            <button type="submit" class="search-icon"><i class="zmdi zmdi-search"></i></button>
        </form>
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
                 @foreach ($suppliers as $supplier)
                <tr>
                <td>{{$supplier->supplier_id}}</td>
                <td>{{$supplier->supplier_name}}</td>
                <td>{{$supplier->contact_info}}</td>
                <td>{{$supplier->address}}</td>
            </tr>
                @endforeach 
            </tbody>
        </table>
    </div>

    </div>

@endsection
