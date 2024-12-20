@extends('layouts.layout')

@section('title', 'Edit Pesanan')

@section('content')
    <div class="edit-order-container">
        <h1 class="edit-order-title">Edit Pesanan</h1>

        <!-- Order Edit Form -->
        <form action="{{ route('orders.update', $order->order_id) }}" method="POST" class="edit-order-form">
            @csrf
            @method('PUT')

            <!-- Customer Name -->
            <div class="edit-order-group">
                <label for="customer_name" class="edit-order-label">ID Pelanggan:</label>
                <input type="text" name="customer_id" class="edit-order-input" value="{{ old('customer_id', $order->customer_id) }}" readonly />
            </div>
        
            <!-- Order Date -->
            <div class="edit-order-group">
                <label for="date" class="edit-order-label">Tanggal Order:</label>
                <input type="date" name="order_date" class="edit-order-input" value="{{ old('order_date', $order->order_date) }}" readonly />
            </div>

            <!-- Completion Date -->
            <div class="edit-order-group">
                <label for="completion_date" class="edit-order-label">Tanggal Selesai:</label>
                <input type="date" name="completion_date" class="edit-order-input" value="{{ old('completion_date', $order->completion_date) }}"/>
            </div>

            <!-- Order Status -->
            <div class="edit-order-group">
                <label for="status" class="edit-order-label">Status Pesanan:</label>
                <select name="status" class="edit-order-select" required>
                    <option value="Selesai_Dikerjakan" {{ $order->status == 'Selesai_Dikerjakan' ? 'selected' : '' }}>Selesai_Dikerjakan</option>
                    <option value="Selesai" {{ $order->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                    <option value="Dibatalkan" {{ $order->status == 'Dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                </select>
            </div>

            <!-- Submit Button -->
            <div class="edit-order-group">
                <button type="submit" class="edit-order-button">Update Pesanan</button>
            </div>
        </form>
    </div>
@endsection
