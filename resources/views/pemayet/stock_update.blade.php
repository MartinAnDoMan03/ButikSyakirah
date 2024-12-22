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
      <!-- Baris 1 -->
      <div class="row">
        <div class="column">
          <label for="stock_type">Tipe Stok:</label>
          <input type="text" id="stock_type" name="stock_type" required>
        </div>
        <div class="column">
          <label for="stock_type">Nama Stok:</label>
          <input type="text" id="stock)name" name="stock_name" required>
        </div>
        <div class="column">
          <label for="lingkar-dada">Jumlah(cm untuk kain, gulung untuk benang):</label>
          <input type="number" id="quantity" name="quantity" required>
        </div>
      
    </div>

    <button type="submit">Selesai</button>
  </form>
</div>
@endsection
