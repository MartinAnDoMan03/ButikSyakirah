@extends('layouts.layoutadmin')

@section('title', 'Log Pembayaran')

@section('content')
    <h1>Log Pembayaran</h1>

    <!-- Tabel Data Customer -->
    <div class="search-container">
        <input type="text" placeholder="Search..." class="search-input">
        <button class="search-icon"><i class="zmdi zmdi-search"></i></button>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr class="order_log">
                    <th>ID log Pembayaran</th>
                    <th>ID Pesanan</th>
                    <th>Jumlah pembayaran</th>
                    <th>Metode Pembayaran</th>
                    <th>Tanggal Pembayaran</th>


                </tr>
            </thead>
            <tbody id="paymentLogTableBody">
                @foreach ($payment_logs as $payment_log)
                    <tr>
                        <td>{{ $payment_log->payment_id }}</td>
                        <td>{{ $payment_log->order_id }}</td>
                        <td>{{ $payment_log->payment_amount }}</td>
                        <td>{{ $payment_log->payment_method }}</td>
                        <td>{{ $payment_log->payment_date }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
