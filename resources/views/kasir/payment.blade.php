@extends('layouts.layoutadmin')

@section('title', 'Tambah Pembayaran')

@section('content')
    <h1>Tambah Pembayaran</h1>

    <div class="form-container">
        <form action="{{ route('payment_logs.store') }}" method="POST">
            @csrf

            <!-- Order ID -->
            <div class="form-group">
                <label for="order_id">ID Pesanan</label>
                <select name="order_id" id="order_id" required>
                    <option value="" disabled selected>Pilih ID Pesanan</option>
                    @foreach ($orders as $order)
                        <option value="{{ $order->order_id }}">{{ $order->order_id }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Payment Method -->
            <div class="form-group">
                <label for="payment_method">Metode Pembayaran</label>
                <select name="payment_method" id="payment_method" required>
                    <option value="" disabled selected>Pilih Metode Pembayaran</option>
                    <option value="Cash">Cash</option>
                    <option value="Bank Transfer">Bank Transfer</option>
                </select>
            </div>

            <!-- Payment Amount -->
            <div class="form-group">
                <label for="payment_amount">Jumlah Pembayaran</label>
                <input type="number" name="payment_amount" id="payment_amount" required>
            </div>

            <button type="submit" class="btn btn-primary">Tambah Pembayaran</button>
        </form>
    </div>
@endsection
