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
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->customer_id }}</td>
                    <td>{{ $order->customer->customer_name }}</td>
                    <td>{{ $order->detail_ukuran }}</td>
                    <td>
                        <!-- Menampilkan nama penjahit yang diambil dari tabel users dengan role 'penjahit' -->
                        {{ $order->getPenjahit()->name ?? 'Belum Ditemukan' }}
                    </td>
                    <td>
                        <!-- Link ke halaman edit pesanan -->
                        <a href="{{ route('penggunting.edit_pesanan', $order->order_id) }}"
                            class="btn btn-sm btn-warning">Edit</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
