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
                </select>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="5">No orders found.</td>
        </tr>
    @endforelse

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
</tbody>

<tbody id="customerTableBody">
    @forelse ($orders as $order)
        <tr>
            <td>{{ $order->customer_id }}</td>
            <td>{{ $order->order_id }}</td>
            <td>{{ $order->sequin_price }}</td>
            <td>{{ $order->completion_date ?? 'Belum selesai' }}</td>
            <td>
                <form action="{{ route('update.status', $order->order_id) }}" method="POST" class="status-form">
                    @csrf
                    @method('PUT')
                    <select name="status" class="status-dropdown">
                        <option value="Belum Selesai">Belum Selesai</option>
                        <option value="Selesai" {{ $order->status === 'Selesai' ? 'selected' : '' }}>Selesai</option>
                    </select>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="5">No orders found.</td>
        </tr>
    @endforelse
</tbody>

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

