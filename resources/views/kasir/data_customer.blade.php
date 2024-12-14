@extends('layouts.layout')

@section('title', 'Data Customer')

@section('content')
    <h1>Data Customer</h1>

    <!-- Tabel Data Customer -->
    <div class="search-container">
        <input type="text" placeholder="Search..." class="search-input">
        <button class="search-icon"><i class="zmdi zmdi-search"></i></button>
    </div>                     

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
                @foreach ($customers as $customer)
                    <tr>
                        <td>{{ $customer->customer_id }}</td>
                        <td>{{ $customer->customer_name }}</td>
                        <td>{{ $customer->address }}</td>
                        <td>{{ $customer->phone }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->created_at }}</td>
                        <td>{{ $customer->updated_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
