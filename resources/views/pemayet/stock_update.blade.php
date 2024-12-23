@extends('layouts.layoutpayet')

@section('title', 'Ambil Stock')

@section('content')
<div class="container2">
  <h1>Ambil Stock</h1>
  <form action="{{ route('stock.deduct') }}" method="POST">
    @csrf
    <div class="form-group">
      <label for="order_id">ID Pesanan:</label>
      <input type="text" id="order_id" name="order_id" required>
    </div>

    <div class="form-group">
      <label for="stock_id">ID Stok:</label>
      <input type="number" id="stock_id" name="stock_id" required>
    </div>

    <div class="form-group">
      <label for="quantity">Jumlah (cm untuk kain, gulung untuk benang):</label>
      <input type="number" id="quantity" name="quantity" required>
    </div>

    <button type="submit" class="btn btn-primary">Selesai</button>
  </form>
</div>
@endsection
