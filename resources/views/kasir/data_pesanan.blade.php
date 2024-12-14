@extends('layouts.layout')

@section('title', 'Data Pesanan')

@section('content')

    <h1>Daftar Pesanan</h1>

    <!-- Tabel Pesanan -->
    <div class="search-faktur-container">
        <button class="btn-create-faktur">Buat Faktur</button>
        <div class="search-input-wrapper">
            <input type="text" placeholder="Search..." class="search-input2">
            <button class="search-icon2"><i class="zmdi zmdi-search"></i></button>
        </div>
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
                                <form action="{{ route('createFaktur') }}" method="POST" style="display:inline;">
                                    @csrf
                                    <input type="hidden" name="order_id" value="{{ $order->id }}">
                                    <button type="submit" class="btn btn-faktur">Buat Faktur</button>
                                </form>
                            </div>
                        </td>                        
                    </td>
                    <td>{{ $order->status }}</td>
                </tr>
                @empty
           
                @endforelse
            </tbody>
        </table>
    </div>

@endsection