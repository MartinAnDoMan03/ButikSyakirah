<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Butik')</title>
    <link rel="stylesheet" href="{{ asset('css/adminpage.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/material-design-iconic-font/css/material-design-iconic-font.min.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="logo">Syakirah Butik</div>
        <div class="logout">
            <form action="{{ url('logout') }}" method="POST" id="logoutForm">
                @csrf
                <button type="submit" id="logoutButton" style="background: none; border: none;">
                    <i class="fas fa-power-off"></i>
                </button>
            </form>
        </div>
    </div>
    
    <!-- Container -->
    <div class="container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <h2></h2>
            <ul>

                <li><a href="{{ url('/admin/pengguna') }}"><i class="zmdi zmdi-store"></i> Kelola Pengguna</a></li>
                <li><a href="{{ url('/admin/stokBarang') }}"><i class="zmdi zmdi-store"></i> Stok Barang</a></li>
                <li><a href="{{ url('/admin/riwayatPesanan') }}"><i class="zmdi zmdi-file-text"></i> Riwayat Pesanan</a></li>
                <li><a href="{{ url('/admin/customer') }}"><i class="zmdi zmdi-file-text"></i> Data Customer</a></li>
                <li><a href="{{ url('/admin/supplier') }}"><i class="zmdi zmdi-file-text"></i> Supplier</a></li>
                <li><a href="{{ url('/admin/order_log') }}"><i class="zmdi zmdi-file-text"></i> Log Pesanan</a></li>
                <li><a href="{{ url('/admin/payment_log') }}"><i class="zmdi zmdi-file-text"></i> Log Pembayaran</a></li>
                <li><a href="{{ url('/admin/inventory_log') }}"><i class="zmdi zmdi-file-text"></i> Log Inventori</a></li>
                <li class="dropdown">
                    <a href="#"><i class="zmdi zmdi zmdi-account"></i> Akun</a>
                    <ul class="dropdown-menu">
                        <li><a href="{{url('/kasir/add_pesanan')}}">Kasir</a></li>
                        <li><a href="{{url('/penggunting/data_pesanan')}}">Penggunting</a></li>
                        <li><a href="{{url('/penjahit/data_pesanan')}}">Penjahit</a></li>
                        <li><a href="{{url('/pemayet/data_pesanan')}}">Pemayet</a></li>
                    </ul>
                </li>              
            </ul>
        </aside>
        <!-- Main Content -->
        <main class="main-content">
            @yield('content')
        </main>
    </div>


    <script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>
