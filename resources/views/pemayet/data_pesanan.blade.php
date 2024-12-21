<tbody id="customerTableBody">
    @forelse ($orders as $order)
        <tr>
            <td>{{ $order->customer_id }}</td>
            <td>{{ $order->order_id }}</td>
            <td>{{ $order->sequin_price }}</td>
            <td>{{ $order->completion_date ?? 'Belum selesai' }}</td>
            <td>
                <select name="status" class="status-dropdown">
                    <option value="Diproses" {{ $order->status === 'Diproses' ? 'selected' : '' }}>Diproses</option>
                    <option value="Selesai_Dikerjakan" {{ $order->status === 'Selesai_Dikerjakan' ? 'selected' : '' }}>Selesai Diproses</option>
                    <option value="Selesai" {{ $order->status === 'Selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="5">No orders found.</td>
        </tr>
    @endforelse
</tbody>
