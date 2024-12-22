@extends('layouts.layoutadmin')

@section('title', 'Data Orders')

@section('content')
    <h1>Data Orders</h1>

    <!-- Tabel Data Orders -->
    <div class="search-container">
        <form action="{{ route('admin.search.orders') }}" method="GET">
            <input 
                type="text" 
                name="query" 
                placeholder="Cari Orders..." 
                class="search-input" 
                value="{{ request()->query('query') }}"> <!-- Menampilkan query sebelumnya -->
            <button type="submit" class="search-icon"><i class="zmdi zmdi-search"></i></button>
        </form>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr class="order">
                    <th>Order ID</th>
                    <th>Nama Customer</th>
                    <th>Tanggal Order</th>
                    <th>Tanggal Selesai</th>
                    <th>Jenis Order</th>
                    <th>Tipe Kain</th>
                    <th>Panjang Kain</th>
                    <th>Catatan</th>
                    <th>Harga</th>
                    <th>Lingkar Dada</th>
                    <th>Lingkar Pinggang</th>
                    <th>Lingkar Lengan</th>
                    <th>Panjang Lengan</th>
                    <th>Lebar Bahu</th>
                    <th>Lingkar Pinggul</th>
                    <th>Lingkar Pergelangan</th>
                    <th>Panjang Bahu</th>
                    <th>Status Jahitan</th>
                    <th>Ubah Status</th>
                </tr>
            </thead>
            <tbody id="orderTableBody">
                @forelse ($orders as $order)
                    <tr>
                        <td>{{ $order->order_id }}</td>
                        <td>{{ $order->customer_name }}</td>
                        <td>{{ $order->order_date }}</td>
                        <td>{{ $order->completion_date ?? 'Belum selesai' }}</td>
                        <td>{{ $order->order_type }}</td>
                        <td>{{ $order->store_cloth_type }}</td>
                        <td>{{ $order->store_cloth_length }}</td>
                        <td>{{ $order->note }}</td>
                        <td>{{ $order->price }}</td>
                        <td>{{ $order->chest_circumference }}</td>
                        <td>{{ $order->waist_circumference }}</td>
                        <td>{{ $order->arm_circumference }}</td>
                        <td>{{ $order->arm_length }}</td>
                        <td>{{ $order->shoulder_width }}</td>
                        <td>{{ $order->hip }}</td>
                        <td>{{ $order->wrist_circumference }}</td>
                        <td>{{ $order->shoulder_length }}</td>
                        <td>{{ $order->seam_status }}</td>
                        <td>
                            <form action="{{ route('update.status', $order->order_id) }}" method="POST" class="status-form">
                                @csrf
                                @method('PUT')
                                <select name="status" class="status-dropdown">
                                    <option value="Belum Selesai" {{ $order->status === 'Belum Selesai' ? 'selected' : '' }}>Belum Selesai</option>
                                    <option value="Selesai" {{ $order->status === 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                </select>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="19">No orders found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.status-dropdown').forEach(dropdown => {
                dropdown.addEventListener('change', function (e) {
                    const form = this.closest('form');
                    const selectedOption = this.options[this.selectedIndex].text;
                    if (confirm(`Are you sure you want to change the status to "${selectedOption}"?`)) {
                        form.submit(); 
                    } else {
                        e.preventDefault();
                        this.value = this.dataset.currentValue;
                    }
                });

                // Store the initial value to reset later if needed
                dropdown.dataset.currentValue = dropdown.value;
            });
        });
    </script>
@endsection
