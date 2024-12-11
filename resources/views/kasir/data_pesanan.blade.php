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
                <tr class ="addpesanan">
                    <th>No </th>
                    <th>Nama Pelanggan</th>
                    <th>Tanggal Order</th>
                    <th>Tanggal Selesai</th>
                    <th>Total Biaya</th>
                    <th>Menu</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody id="orderTableBody">
                @forelse ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->customer_name }}</td>
                    <td>{{ $order->order_date }}</td>
                    <td>{{ $order->completion_date }}</td>
                    <td>{{ number_format($order->total_cost, 0, ',', '.') }}</td>
                    <td>
                        <td>
                            <div class="menu-buttons">
                                <a href="{{ url('edit-pesanan/'.$order->id) }}" class="btn btn-edit">Edit</a>
                                <a href="{{ url('add-detail-pesanan/'.$order->id) }}" class="btn btn-add-detail">Add Detail Pesanan</a>
                                <a href="{{ url('detail-ukuran/'.$order->id) }}" class="btn btn-detail-ukuran">Detail Ukuran</a>
                                <a href="{{ route('faktur', $order->id) }}" class="btn btn-faktur">Lihat Faktur</a>
                            </div>
                        </td>                        
                    </td>
                    <td>{{ $order->status }}</td>
                </tr>
                @empty
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                
                @endforelse
            </tbody>
        </table>
    </div>

@endsection