@extends('layouts.layoutpekerja')

@section('title', 'Ambil Stock')

@section('content')
<div class="container2">
  <h1>Order</h1>
  <form action="{{ route('stock.deduct') }}" method="POST">
    @csrf
    <div class="form-group">
      <label for="customer">ID Pesanan</label>
      <input type="text" id="order_id" name="order_id" required>
    </div>

    <div class="form-group">
      <h3>Form Ambil Stock:</h3>
      <!-- Stock Type -->
      <div class="row">
        <div class="column">
          <label for="stock_type">Tipe Stok:</label>
          <select id="stock_type" name="stock_type" required>
            <option value="" disabled selected>Pilih Tipe Stok</option>
            @foreach ($stockTypes as $type)
                <option value="{{ $type }}">{{ $type }}</option>
            @endforeach
          </select>
        </div>

        <!-- Stock Name -->
        <div class="column">
          <label for="stock_name">Nama Stok:</label>
          <select id="stock_name" name="stock_name" required>
            <option value="" disabled selected>Pilih Tipe Stok Terlebih Dahulu</option>
          </select>
        </div>

        <!-- Quantity -->
        <div class="column">
          <label for="quantity">Jumlah (cm untuk kain, gulung untuk benang):</label>
          <input type="number" id="quantity" name="quantity" required>
        </div>
      </div>
    </div>

    <button type="submit" class="btn btn-primary">Selesai</button>
  </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const stockTypeSelect = document.getElementById('stock_type');
        const stockNameSelect = document.getElementById('stock_name');

        stockTypeSelect.addEventListener('change', function () {
            const stockType = this.value;

            // Clear previous options
            stockNameSelect.innerHTML = '<option value="" disabled selected>Loading...</option>';

            // Fetch stock names based on the selected type
            fetch('{{ route('stock.names') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ type: stockType })
            })
            .then(response => response.json())
            .then(data => {
                stockNameSelect.innerHTML = '<option value="" disabled selected>Pilih Nama Stok</option>';
                data.forEach(stock => {
                    const option = document.createElement('option');
                    option.value = stock.name;
                    option.textContent = stock.name;
                    stockNameSelect.appendChild(option);
                });
            })
            .catch(error => {
                console.error('Error:', error);
                stockNameSelect.innerHTML = '<option value="" disabled selected>Error loading options</option>';
            });
        });
    });
</script>
@endsection
