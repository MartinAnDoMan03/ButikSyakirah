@extends('layouts.layout')

@section('title', 'Detail Ukuran')

@section('content')
<div class="container">
    <h1>Detail Ukuran</h1>

    <p><strong>ID Pesanan:</strong> {{ $order->order_id }}</p>
    <p><strong>Nama Pelanggan:</strong> {{ $order->customer_name }}</p>

    @if ($sizeDetail)
        <h3>Detail Ukuran:</h3>
        <ul>
            <li>Lingkar Dada: {{ $sizeDetail->lingkar_dada }} cm</li>
            <li>Bahu: {{ $sizeDetail->bahu }} cm</li>
            <li>Pinggang: {{ $sizeDetail->pinggang }} cm</li>
            <li>Pinggul: {{ $sizeDetail->pinggul }} cm</li>
            <li>Lengan: {{ $sizeDetail->lengan }} cm</li>
            <li>Lingkar Pergelangan: {{ $sizeDetail->lingkar_pergelangan }} cm</li>
            <li>Panjang Tangan: {{ $sizeDetail->panjang_tangan }} cm</li>
            <li>Panjang Baju: {{ $sizeDetail->panjang_baju }} cm</li>
        </ul>
    @else
        <p>Detail ukuran belum dimasukkan.</p>
    @endif
</div>
@endsection
