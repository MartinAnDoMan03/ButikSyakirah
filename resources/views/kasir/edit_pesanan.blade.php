<!-- resources/views/orders/edit.blade.php -->
@extends('layouts.layout')

@section('title', 'Edit Pesanan')

@section('content')
    <h1>Edit Pesanan</h1>

    <!-- Order Edit Form -->
    <form action="{{ route('orders.update', $order->order_id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Customer Name -->
        <div>
            <label for="customer_name">ID Pelanggan:</label>
            <input type="text" name="customer_id" value="{{ old('customer_id', $order->customer_id) }}" readonly />
        </div>
    
        <!-- Order Date -->
        <div>
            <label for="order_date">Tanggal Order:</label>
            <input type="date" name="order_date" value="{{ old('order_date', $order->order_date) }}" readonly />
        </div>

        <!-- Completion Date -->
        <div>
            <label for="completion_date">Tanggal Selesai:</label>
            <input type="date" name="completion_date" value="{{ old('completion_date', $order->completion_date) }}"/>
        </div>

        <!-- Order Status -->
        <div>
            <label for="status">Status Pesanan:</label>
            <select name="status" required>
                <option value="Selesai_Dikerjakan" {{ $order->status == 'Selesai_Dikerjakan' ? 'selected' : '' }}>Selesai_Dikerjakan</option>
                <option value="Selesai" {{ $order->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                <option value="Dibatalkan" {{ $order->status == 'Dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
            </select>
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit">Update Pesanan</button>
        </div>
    </form>
@endsection
