@extends('layouts.layoutjahit')

@section('title', 'Data Sequin Orders')

@section('content')
    <h1>Data Sequin Orders</h1>

    <!-- Tabel Data Sequin Orders -->
    <div class="table-container">
        <table>
            <thead>
                <tr class="order">
                    <th>Order ID</th>
                    <th>Nama Customer</th>
                    <th>Tanggal Order</th>
                    <th>Tanggal Selesai</th>
                    <th>Catatan</th>
                    <th>Harga Sequin</th>
                    <th>Status Sequin</th>
                    <th>Ubah Status</th>
                </tr>
            </thead>
            <tbody id="sequinOrderTableBody">
                @forelse ($orders as $order)
                    <tr>
                        <td>{{ $order->order_id }}</td>
                        <td>{{ $order->customer_name }}</td>
                        <td>{{ $order->order_date }}</td>
                        <td>{{ $order->completion_date ?? 'Belum selesai' }}</td>
                        <td>{{ $order->note }}</td>
                        <td>{{ $order->sequin_price }}</td>
                        <td>{{ $order->sequin_status }}</td>
                        <td>
                            <form action="{{ route('sequin.update_status', $order->order_id) }}" method="POST" class="status-form">
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
                        <td colspan="8">No orders found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

@section('scripts')
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
