@extends('layouts.layoutadmin')

@section('title', 'Log Inventori')

@section('content')
    <h1>Log Inventori</h1>

    <!-- Tabel Data Customer -->
    <div class="search-container">
        <input type="text" placeholder="Search..." class="search-input">
        <button class="search-icon"><i class="zmdi zmdi-search"></i></button>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr class="order_log">
                    <th>ID Transaksi</th>
                    <th>ID stok</th>
                    <th>Tipe Referensi</th>
                    <th>ID referensi order</th>
                    <th>ID referensi supplier</th>
                    <th>Tipe Transaksi</th>
                    <th>Jumlah</th>
                    <th>Tanggal Transaksi</th>


                </tr>
            </thead>
            <tbody id="inventoryLogTableBody">
                @foreach ($inventory_logs as $inventory_log)
                    <tr>
                        <td>{{ $inventory_log->transaction_id }}</td>
                        <td>{{ $inventory_log->stock_id }}</td>
                        <td>{{ $inventory_log->reference_type }}</td>
                        <td>{{ $inventory_log->order_reference_id }}</td>
                        <td>{{ $inventory_log->supplier_reference_id }}</td>
                        <td>{{ $inventory_log->transaction_type }}</td>
                        <td>{{ $inventory_log->quantity }}</td>
                        <td>{{ $inventory_log->transaction_date }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
