@extends('layouts.layoutpekerja')

@section('title', 'Data Pesanan')

@section('content')
    <h1>Data Pesanan</h1>

    <!-- Tabel Data Customer -->
    <div class="search-container">
        <input type="text" placeholder="Search..." class="search-input">
        <button class="search-icon"><i class="zmdi zmdi-search"></i></button>
    </div>                     

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Customer ID</th>
                    <th>Nama Customer</th>
                    <th>Detail Ukuran</th>
                    <th>Nama Penjahit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="customerTableBody">
                <!-- Baris customer akan ditambahkan di sini -->
            </tbody>
        </table>
    </div>
@endsection
