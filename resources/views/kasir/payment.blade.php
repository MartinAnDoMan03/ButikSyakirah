@extends('layouts.layout')

@section('title', 'Pembayaran')

@section('content')

    <style>
        /* Shared Styles for Forms */
        .form-container-payment {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            max-width: 600px;
            margin: 20px auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-container-payment h3 {
            margin-bottom: 20px;
            color: #333;
        }

        .form-container-payment label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .form-container-payment input,
        .form-container-payment select,
        .form-container-payment button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        .form-container-payment button {
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .form-container-payment button:hover {
            background-color: #0056b3;
        }

        @media (max-width: 768px) {
            .form-container-payment input,
            .form-container-payment select,
            .form-container-payment button {
                font-size: 12px;
            }

            .form-container-payment {
                padding: 15px;
            }
        }
    </style>

    <h1>Pembayaran</h1>

    <!-- Form Input untuk Menambah Stok Barang Baru -->
    <div class="form-container-payment">
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
