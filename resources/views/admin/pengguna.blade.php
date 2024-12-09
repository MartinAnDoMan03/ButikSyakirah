@extends('layouts.layoutadmin')

@section('title', 'Pengguna')

@section('content')
            <h1>Daftar Akun Pengguna</h1>
            <div class="search-container">
                <input type="text" placeholder="Search..." class="search-input">
                <button class="search-icon"><i class="zmdi zmdi-search"></i></button>
            </div>    
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nama Pengguna</th>
                            <th>Email</th>
                            <th>No.HP</th>
                            <th>Status Pekerjaan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data akan dimasukkan di sini -->
                    </tbody>
                </table>
@endsection
