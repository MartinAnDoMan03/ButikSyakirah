@extends('layouts.layout')

@section('title', 'Data Customer')

@section('content')
    <h1>Data Customer</h1>

    <!-- Form Pencarian -->
    <div class="search-container">
        <form action="{{ route('kasir.search.customer') }}" method="GET">
            <input 
                type="text" 
                name="query" 
                placeholder="Cari Customer..." 
                class="search-input" 
                value="{{ request()->query('query') }}"> <!-- Menampilkan query sebelumnya -->
            <button type="submit" class="search-icon"><i class="zmdi zmdi-search"></i></button>
        </form>
        
    </div>                     

    <!-- Tabel Data Customer -->
    <div class="table-container">
        <table>
            <thead>
                <tr class="customer">
                    <th>Customer ID</th>
                    <th>Nama Customer</th>
                    <th>Alamat</th>
                    <th>No Hp</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody id="customerTableBody">
                @forelse ($customers as $customer)
                    <tr>
                        <td>{{ $customer->customer_id }}</td>
                        <td>{{ $customer->customer_name }}</td>
                        <td>{{ $customer->address }}</td>
                        <td>{{ $customer->phone }}</td>
                        <td>{{ $customer->email }}</td>
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
