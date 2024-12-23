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
                    <th>Nama Pelanggan</th>
                    <th>Tanggal Order</th>
                    <th>Tanggal Selesai</th>
                    <th>Total Biaya</th>
                    <th>Menu</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody id="orderTableBody">
                @forelse ($orders as $order)
                    <tr>
                        <td>{{ $order->order_id }}</td>
                        <td>{{ $order->customer_name}}</td>
                        <td>{{ $order->order_date }}</td>
                        <td>{{ $order->completion_date }}</td>
                        <td>{{ number_format($order->price, 0, ',', '.') }}</td>
                        <td class="menu-buttons">
                            <!-- Tombol Edit -->
                            <a href="{{ route('orders.edit', $order->order_id) }}" class="btn btn-edit" title="Edit">
                                <i class="fa fa-edit"></i>
                            </a>

                            <a href="{{ route('order.detail', $order->order_id) }}" class="btn btn-detail" title="detail">
                                <i class="fa fa-plus-circle"></i>
                            </a>

                            <a href="{{ route('order.size', $order->order_id) }}" class="btn btn-detail" title="detail">
                                <i class="fa fa-ruler-combined"></i>
                            </a>

                            <a href="{{ route('order.lihatDetail', $order->order_id) }}" class="btn btn-detail" title="detail">
                                <i class="fa fa-file-alt"></i>
                            </a>

                        </td>
                        <td>{{ $order->status }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">Tidak ada data ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <script>
        function openDetailUkuranModal(orderId) {
            const modal = document.getElementById('detailUkuranModal');
            modal.style.display = 'block';

            // Clear previous data
            const fields = ['lingkarDada', 'lingkarPinggang', 'lingkarLengan', 'panjangTangan', 'lebarBahu', 'pinggul',
                'lingkarPergelangan', 'panjangBaju'
            ];
            fields.forEach(field => {
                document.getElementById(field).textContent = '-';
            });

            // Fetch size details
            fetch(`/detail-ukuran/${orderId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        alert(data.error);
                        return;
                    }

                    // Populate the modal with size details
                    document.getElementById('lingkarDada').textContent = data.lingkar_dada || '-';
                    document.getElementById('lingkarPinggang').textContent = data.lingkar_pinggang || '-';
                    document.getElementById('lingkarLengan').textContent = data.lingkar_lengan || '-';
                    document.getElementById('panjangTangan').textContent = data.panjang_tangan || '-';
                    document.getElementById('lebarBahu').textContent = data.lebar_bahu || '-';
                    document.getElementById('pinggul').textContent = data.pinggul || '-';
                    document.getElementById('lingkarPergelangan').textContent = data.lingkar_pergelangan || '-';
                    document.getElementById('panjangBaju').textContent = data.panjang_baju || '-';
                })
                .catch(error => {
                    console.error('Error fetching size details:', error);
                    alert('Failed to fetch size details.');
                });
        }
    </script>


@endsection
