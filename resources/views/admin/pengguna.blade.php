@extends('layouts.layoutadmin')

@section('title', 'Pengguna')

@section('content')
            <h1>Daftar Akun Pengguna</h1>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nama Pengguna</th>
                            <th>Email</th>
                            <th>No. Hp</th>
                            <th>Posisi</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody id="userTableBody">
                        <tr>
                            @foreach ($users as $user)
                            <!-- Data akan dimasukkan di sini -->
                            <td>{{$user->user_id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone_number}}</td>
                            <td>{{$user->role}}</td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
@endsection
