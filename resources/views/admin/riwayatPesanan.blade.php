@extends('layouts.layoutadmin')

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
                        <!-- Data akan dimasukkan di sini -->
                        @foreach ($orders as $order)
                        <tr>
                        <td>{{$order->order_id}}</td>
                        <td>{{$order->customer_id}}</td>
                        <td>{{$order->order_date}}</td>
                        <td>{{$order->completion_date}}</td>
                        <td>{{$order->total_price}}</td>
                        <td>{{$order->status}}</td>
                    </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
@endsection
