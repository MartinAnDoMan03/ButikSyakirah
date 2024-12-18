@extends('layouts.layout')

@section('title', 'Data Customer')

@section('content')
    <h1>Tambah Detail Pesanan</h1>
    <div class="order-form" id="addStockForm">
        <form action="{{ route('size_detail.store') }}" method="POST">
            @csrf

            <div>
                <select id="order_id" name="order_id" required>
                    <option value="">Pilih Customer</option>
                    @foreach ($orders as $order)
                    <option value="{{ $order->order_id }}">{{ $order->order_id }}</option>
                @endforeach

                </select>
            </div>
            <div>
                <label for="waist_circumference">Lingkar Pinggang</label>
                <input type="text" id="waist_circumference" name="waist_circumference"
                    placeholder="Masukkan Ukuran Lingkar Pinggang (cm)">
            </div>

            <div>
                <label for="arm_circumference">Lingkar Tangan</label>
                <input type="text" id="arm_circumference" name="arm_circumference"
                    placeholder="Masukkan Ukuran Lingkar Tangan (cm)">
            </div>

            <div>
                <label for="body_height">Tinggi Badan</label>
                <input type="text" id="body_height" name="body_height" placeholder="Masukkan Ukuran Tinggi Badan (cm)">
            </div>

            <div>
                <label for="shoulder_width">Lebar Bahu</label>
                <input type="text" id="shoulder_width" name="shoulder_width"
                    placeholder="Masukkan Ukuran Lingkar Pinggang (cm)">
            </div>

            <div>
                <label for="chest_circumference">Lingkar Dada</label>
                <input type="text" id="chest_circumference" name="chest_circumference"
                    placeholder="Masukkan Ukuran Lingkar Pinggang (cm)">
            </div>

            <div>
                <label for="arm_length">Panjang Lengan</label>
                <input type="text" id="arm_length" name="arm_length" placeholder="Masukkan Ukuran Lingkar Pinggang (cm)">
            </div>

            <button type="submit">Masukkan Data Ukuran</button>
        </form>
    </div>
@endsection
