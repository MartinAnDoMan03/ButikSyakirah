@extends('layouts.layoutadmin')

@section('title', 'Log Pesanan')

@section('content')
    <h1>Log Pesanan</h1>

    <!-- Tabel Data Customer -->
    <div class="search-container">
        <input type="text" placeholder="Search..." class="search-input">
        <button class="search-icon"><i class="zmdi zmdi-search"></i></button>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr class="order_log">
                    <th>ID Log Pesanan</th>
                    <th>ID Pesanan</th>
                    <th>Status lama</th>
                    <th>Status terbaru</th>
                    
                </tr>
            </thead>
            <tbody id="orderLogTableBody">
                @foreach ($order_logs as $order_log)
                    <tr>
                        <td>{{ $order_log->order_log_id }}</td>
                        <td>{{ $order_log->order_id }}</td>
                        <td>{{ $order_log->old_status }}</td>
                        <td>{{ $order_log->new_status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
