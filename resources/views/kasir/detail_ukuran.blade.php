@extends('layouts.layout')

@section('title', 'Data Pesanan')

@section('content')

    <h1>Daftar Pesanan</h1>

    <!-- Tabel Pesanan -->
    <div class="search-faktur-container">
        <div class="search-input-wrapper">
            <form action="{{ route('search.pesanan') }}" method="GET">
                <input type="text" name="query" placeholder="" class="search-input2" value="{{ request('query') }}">
                <button type="submit" class="search-icon2"><i class="zmdi zmdi-search"></i></button>
            </form>
        </div>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr class ="addpesanan">
                    <th>No </th>
                    <th>ID detail</th>
                    <th>Lingkar dada</th>
                    <th>pinggang</th>
                    <th>Lengan</th>
                    <th>Panjang lengan</th>
                    <th>Bahu</th>
                    <th>Pinggul</th>
                    <th>Lingkar Pergelangan</th>
                    <th>Panjang Bahu</th>
                </tr>
            </thead>
            <tbody id="orderTableBody">
                @forelse ($size_details as $order_detail)
                    <tr>
                        <td>{{ $order_detail->size_detail_id }}</td>
                        <td>{{ $order_detail->order_detail_id }}</td>
                        <td>{{ $order_detail->chest_circumference }}</td>
                        <td>{{ $order_detail->waist_circumference }}</td>
                        <td>{{ $order_detail->arm_circumference }}</td>
                        <td>{{ $order_detail->arm_length }}</td>
                        <td>{{ $order_detail->shoulder_width }}</td>
                        <td>{{ $order_detail->hip }}</td>
                        <td>{{ $order_detail->wrist_circumference }}</td>
                        <td>{{ $order_detail->shoulder_length }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Tidak ada data ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
