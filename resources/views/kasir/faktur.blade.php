<h1>Faktur Pesanan</h1>
<p><strong>Nama Pelanggan:</strong> {{ $order->customer_name }}</p>
<p><strong>Tanggal Order:</strong> {{ $order->order_date }}</p>
<p><strong>Tanggal Selesai:</strong> {{ $order->completion_date }}</p>
<p><strong>Total Biaya:</strong> Rp{{ number_format($order->total_cost, 0, ',', '.') }}</p>
<p><strong>Status:</strong> {{ $order->status }}</p>

<!-- Jika ada rincian lebih lanjut, misalnya menu yang dipesan -->
<p><strong>Menu yang Dipesan:</strong></p>
<ul>
    @foreach ($order->details as $detail)
        <li>{{ $detail->menu_name }} - Rp{{ number_format($detail->price, 0, ',', '.') }}</li>
    @endforeach
</ul>

<!-- Tombol untuk cetak faktur -->
<button onclick="window.print()">Cetak Faktur</button>
