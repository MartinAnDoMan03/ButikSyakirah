@extends('layouts.layoutjahit')

@section('title', 'Data Orders')

@section('content')
    <h1>Data Orders</h1>

    <!-- Button to redirect to stock update -->
    <div class="button-container" style="margin-bottom: 20px;">
        <a href="{{ route('pemayet.stock_update') }}" class="btn btn-success">Update Stock</a>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr class="order">
                    <th>Order ID</th>
                    <th>Nama Customer</th>
                    <th>Tanggal Order</th>
                    <th>Tanggal Selesai</th>
                    <th>Catatan</th>
                    <th>Harga Sequin</th>
                    <th>Status Sequin</th>
                    <th>Ubah Status</th>
                </tr>
            </thead>
            <tbody id="orderTableBody">
                @forelse ($orders as $order)
                    <tr>
                        <td>{{ $order->order_id }}</td>
                        <td>{{ $order->customer_name }}</td>
                        <td>{{ $order->order_date }}</td>
                        <td>{{ $order->completion_date ?? 'Belum selesai' }}</td>
                        <td>{{ $order->note }}</td>
                        <td>{{ $order->sequin_price }}</td>
                        <td>{{ $order->sequin_status }}</td>
                        <td>
                            <form action="{{ route('sequin.update_status', $order->order_id) }}" method="POST" class="status-form">
                                @csrf
                                @method('PUT')
                                <select name="sequin_status" class="status-dropdown">
                                    <option value="Belum Selesai" {{ $order->status === 'Belum Selesai' ? 'selected' : '' }}>Belum Selesai</option>
                                    <option value="Selesai" {{ $order->status === 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                </select>
                                <button type="submit" class="btn btn-primary">Update Status</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="19">No orders found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
