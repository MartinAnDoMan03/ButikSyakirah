@extends('layouts.layout')

@section('title', 'Riwayat Pesanan')

@section('content')
    <h1>Riwayat Pesanan</h1>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Id Customer</th>
                    <th>Tanggal Pesanan</th>
                    <th>Tanggal Diselesaikan</th>
                    <th>Harga</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data will be inserted here -->
                @foreach ($orders as $order)
                    @foreach ($order_details as $order_detail)
                        @if ($order->order_id == $order_detail->order_id) <!-- Match details to order -->
                            <tr>
                                <td>{{ $order->order_id }}</td>
                                <td>{{ $order->customer_id }}</td>
                                <td>{{ $order->order_date }}</td>
                                <td>{{ $order->completion_date }}</td>
                                <td>{{ $order_detail->price }}</td>
                                <td>{{ $order->status }}</td>
                            </tr>
                        @endif
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
@endsection