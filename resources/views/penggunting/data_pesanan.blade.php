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
                </tr>
            </thead>
            <tbody>
                @forelse ($orders as $order)
                    <tr>
                        <td>{{ $order->order_id }}</td>
                        <td>{{ $order->customer->customer_name ?? 'Tidak Ditemukan' }}</td> <!-- Menampilkan nama customer -->
                        <td>{{ $order->detail_ukuran ?? 'Tidak Tersedia' }}</td> 
                        <td>{{ $order->penjahit->name ?? 'Belum Ditemukan' }}</td> 
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Tidak ada pesanan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
