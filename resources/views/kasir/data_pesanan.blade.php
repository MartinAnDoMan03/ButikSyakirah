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
                    <td>{{ $order->order_id }}</td>
                    <td>{{ $order->customer_name }}</td>
                    <td>{{ $order->order_date }}</td>
                    <td>{{ $order->completion_date }}</td>
                    <td>{{ number_format($order->total_cost, 0, ',', '.') }}</td>
                    <td class="menu-buttons">
                        <!-- Tombol Edit -->
                        <a href="{{ url('edit-pesanan/'.$order->id) }}" class="btn btn-edit" title="Edit">
                            <i class="fa fa-edit"></i> <!-- Ikon Edit (Font Awesome) -->
                        </a>
                    
                        <!-- Tombol Add Detail Pesanan -->
                        <a href="{{ url('add-detail-pesanan/'.$order->id) }}" class="btn btn-add-detail" title="Add Detail Pesanan">
                            <i class="fa fa-plus"></i> <!-- Ikon Plus (Font Awesome) -->
                        </a>
                    
                        <!-- Tombol Detail Ukuran -->
                        <a href="{{ url('detail-ukuran/'.$order->id) }}" class="btn btn-detail-ukuran" title="Detail Ukuran">
                            <i class="fa fa-eye"></i> <!-- Ikon Search (Font Awesome) -->
                        </a>
                    
                        <!-- Tombol Lihat Faktur -->
                        {{-- <a href="{{ route('createFaktur', ['orderId' => $order->id]) }}" class="btn btn-faktur" title="Lihat Faktur">
                            <i class="fa fa-file-alt"></i> 
                        </a> --}}
                        <a href="" class="btn btn-faktur" title="Lihat Faktur">
                            <i class="fa fa-file-alt"></i> 
                        </a>
                    </td>
                                           
                    <td>{{ $order->status }}</td>
                </tr>
                @empty
           
                @endforelse
            </tbody>
        </table>
    </div>

@endsection