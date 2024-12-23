@extends('layouts.layout')

@section('title', 'Data Pesanan')

@section('content')

    <h1>Daftar Pesanan</h1>

    <!-- Tabel Pesanan -->
    <div class="search-faktur-container">
        <div class="search-input-wrapper">
            <form action="{{ route('search.pesanan') }}" method="GET">
                <input type="text" name="query" placeholder="" class="search-input2" value="{{ request('query') }}">
                <button type="submit" class="search-icon2"><i class="zmdi zmdi-search"></i></button>
            </form>
        </div>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr class ="addpesanan">
                    <th>No </th>
                    <th>ID Order</th>
                    <th>Tipe Pakaian</th>
                    <th>Barang pelanggan</th>
                    <th>Tipe Kain toko</th>
                    <th>Panjang Kain Toko</th>
                    <th>Harga Kain</th>
                    <th>Payet</th>
                    <th>Harga payet</th>
                    <th>Harga total</th>
                    <th>Catatan</th>
                </tr>
            </thead>
            <tbody id="orderTableBody">
                @forelse ($order_details as $order_detail)
                    <tr>
                        <td>{{ $order_detail->order_detail_id }}</td>
                        <td>{{ $order_detail->order_id }}</td>
                        <td>{{ $order_detail->order_type }}</td>
                        <td>{{ $order_detail->customer_cloth }}</td>
                        <td>{{ $order_detail->store_cloth_type }}</td>
                        <td>{{ $order_detail->store_cloth_length }}</td>
                        <td>{{ $order_detail->seam_price }}</td>
                        <td>{{ $order_detail->sequin }}</td>
                        <td>{{ $order_detail->sequin_price }}</td>
                        <td>{{ $order_detail->price }}</td>
                        <td>{{ $order_detail->note }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Tidak ada data ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
