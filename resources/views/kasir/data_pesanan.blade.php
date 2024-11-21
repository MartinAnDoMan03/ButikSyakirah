@extends('layouts.layout')

@section('title', 'Data Pesanan')

@section('content')

    <h1>Daftar Pesanan</h1>

    <!-- Tabel Pesanan -->
    <div class="search-container">
        <input type="text" placeholder="Search..." class="search-input">
        <button class="search-icon"><i class="zmdi zmdi-search"></i></button>
    </div> 
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>No. Pesanan</th>
                    <th>Tanggal Order</th>
                    <th>Tanggal Selesai</th>
                    <th>Total Biaya</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody id="orderTableBody">
                <!-- Baris pesanan akan ditambahkan di sini -->
            </tbody>
        </table>
    </div>

@endsection