<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Butik')</title>
    <link rel="stylesheet" href="{{ asset('css/kasirpage.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/material-design-iconic-font/css/material-design-iconic-font.min.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
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
                <li><a href="{{ url('/kasir/add_pesanan') }}"><i class="zmdi zmdi-shopping-cart"></i>Pesanan Baru</a></li>
                <li><a href="{{ url('/kasir/data_pesanan') }}"><i class="zmdi zmdi-shopping-cart"></i> Data Pesanan</a></li>
                <li><a href="{{ url('/kasir/data_customer') }}"><i class="zmdi zmdi-accounts"></i> Data Customer</a></li>
                <li><a href="{{ url('/kasir/stok_barang') }}"><i class="zmdi zmdi-store"></i> Stok Barang</a></li>
                <li><a href="{{ url('/kasir/riwayat_pesanan') }}"><i class="zmdi zmdi-file-text"></i> Riwayat Pesanan</a></li>  
                <li><a href="{{ url('/kasir/supplier') }}"><i class="zmdi zmdi-store"></i> Supplier</a></li>  
                <li><a href="{{ url('/kasir/payment') }}"><i class="zmdi zmdi-store"></i> Pembayaran</a></li>  
                <li><a href="{{ route('order.report') }}"><i class="zmdi zmdi-file-text"></i> Laporan Pesanan</a></li>
                <li><a href="{{ route('sales.report') }}"><i class="zmdi zmdi-file-text"></i> Laporan Pemasukan</a></li>

                
            </ul>
        </aside>
        <!-- Main Content -->
        <main class="main-content">
            @yield('content')
        </main>
    </div>

    <script src="{{ asset('js/kasir.js') }}"></script>
</body>
</html>
