@extends('layouts.layout')

@section('title', 'Faktur')

@section('head')
    <!-- Link ke CSS khusus untuk halaman faktur -->
    <link rel="stylesheet" href="{{ asset('css/faktur.css') }}">
@endsection

@section('content')
<div class="faktur">
    <div class="header">
        <h1>Syaakirah Butik dan Rumah Jahit</h1>
        <p>Jl. Sudirman No.344 Kayuombun | 082166708558</p>
    </div>
    <div class="info">
        <p>Nomor Faktur: <span>{{ $invoice_number }}</span></p>
        <p>Tanggal: <span>{{ $invoice_date }}</span></p>
        <p>Pelanggan: <span>{{ $customer_name }}</span></p>
    </div>
    <table>
        <thead>
            <tr>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Harga Satuan</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
            <tr>
                <td>{{ $item['name'] }}</td>
                <td>{{ $item['quantity'] }}</td>
                <td>{{ number_format($item['unit_price'], 0, ',', '.') }}</td>
                <td>{{ number_format($item['total'], 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="total">
        <p>Total: <span>{{ number_format($total_price, 0, ',', '.') }}</span></p>
    </div>
</div>
<button class="no-print" onclick="window.print()">Cetak Faktur</button>
@endsection
