@extends('layouts.layout')

@section('title', 'Data Customer')

@section('content')
    <h1>Tambah Detail Pesanan</h1>
    <form action="" method="POST">
        @csrf

        <div>
            <select id="order_id" name="order_id" required>
                <option value="">Pilih Customer</option>
                @foreach ($orders as $order)
                    <option value="{{ $order->order_id }}">{{ $order->customer_name }}</option>
                @endforeach

            </select>
        </div>
        <div>
            <label for="payetPrice">Lingkar Pinggang</label>
            <input type="text" id="waist_circumference" name="waist_circumference" placeholder="Masukkan Ukuran Lingkar Pinggang (cm)">
        </div>

        <div>
            <label for="payetPrice">Lingkar Tangan</label>
            <input type="text" id="arm_circumference" name="arm_circumference" placeholder="Masukkan Ukuran Lingkar Tangan (cm)">
        </div>

        <div>
            <label for="payetPrice">Tinggi Badan</label>
            <input type="text" id="body_height" name="body_height" placeholder="Masukkan Ukuran Tinggi Badan (cm)">
        </div>

        <div>
            <label for="payetPrice">Lebar Bahu</label>
            <input type="text" id="shoulder_width" name="shoulder_width" placeholder="Masukkan Ukuran Lingkar Pinggang (cm)">
        </div>

        <div>
            <label for="payetPrice">Lingkar Pinggang</label>
            <input type="text" id="waist_circumference" name="waist_circumference" placeholder="Masukkan Ukuran Lingkar Pinggang (cm)">
        </div>
    </form>
@endsection
