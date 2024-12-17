@extends('layouts.layout')

@section('title', 'Stok Barang')

@section('content')

    <h1>Pembayaran</h1>

    <!-- Tombol Toggle -->
   

    <!-- Form Input untuk Menambah Stok Barang Baru -->
    <div class="order-form" id="addStockForm"">
        <h3>Form Pembayaran</h3>
        <form action="{{ route('payment.store') }}" method="POST">
            @csrf
            <label for="order_id">Order:</label>
            <select id="order_id" name="order_id" required>
                <option value="" selected disabled>Pilih ID pesanan</option>
                @foreach ($orders as $order)
                    <option value="{{ $order->order_id }}">{{ $order->order_id }}</option>
                @endforeach
            </select>

            <label for="payment_amount">Jumlah dibayar :</label>
            <input type="number" id="payment_amount" name="payment_amount" step="5000" required>

            <label for="payment_method">Metode pembayaran :</label>
            <select id="payment_method" name="payment_method" required>
                <option value="" selected disabled>Pilih metode pembayaran</option>
                <option value="Cash">Cash</option>
                <option value="Bank Transfer">Bank Transfer</option>
            </select>

            <button type="submit">Bayar</button>
        </form>
    </div>

@endsection
