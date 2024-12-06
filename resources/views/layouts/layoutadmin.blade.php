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
                <li class="dropdown">
                    <a href="#"><i class="zmdi zmdi zmdi-account"></i> Akun</a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('/kasir/data_pesanan') }}">Kasir</a></li>
                        <li><a href="{{ url('//data_pesanan') }}">Pekerja</a></li>
                    </ul>
                </li>              
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
