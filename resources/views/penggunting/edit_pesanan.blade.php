@extends('layouts.layoutpekerja')

@section('title', 'Data Pesanan')

@section('content')
    <h1>Data Pesanan</h1>

    <!-- Search Bar -->
    <div class="search-container">
        <input type="text" placeholder="Search..." class="search-input">
        <button class="search-icon"><i class="zmdi zmdi-search"></i></button>
    </div>                     

    <!-- Tabel Data Customer -->
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
            <tbody>
                @foreach($order_details as $order)
                    <tr>
                        <td>{{ $order->customer_id }}</td>
                        <td>{{ $order->customer->customer_name }}</td>
                        <td>
                            @if ($order->size_detail)
                                <a href="{{ route('size.details.show', $order->size_detail->id) }}" class="btn btn-sm btn-info">Lihat Detail</a>
                            @else
                                <span>Belum Ditambahkan</span>
                            @endif
                        </td>
                        <td>
                            <!-- Menampilkan nama penjahit (seamer) yang diambil dari tabel users dengan role 'seamer' -->
                            {{ $order->seamer->name ?? 'Belum Ditemukan' }}
                        </td>
                        <td>
                            <!-- Link ke halaman edit pesanan -->
                            <a href="{{ route('penggunting.edit_pesanan', $order->order_id) }}" class="btn btn-sm btn-warning">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
