@extends('layouts.layoutadmin')

@section('title', 'Riwayat Pesanan')

@section('content')
            <h1>Riwayat Pesanan</h1>
            <div class="search-container">
            <input type="text" placeholder="Search..." class="search-input">
            <button class="search-icon"><i class="zmdi zmdi-search"></i></button>
        </div>    
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nama Costumer</th>
                            <th>Detail Pesanan</th>
                            <th>Faktur</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data akan dimasukkan di sini -->
                    </tbody>
                </table>
            </div>
@endsection
