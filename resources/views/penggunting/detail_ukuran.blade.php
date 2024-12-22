@extends('layouts.layoutpekerja')

@section('title', 'Detail Ukuran')

@section('content')
<div class="container2">
  <h1>Detail Ukuran</h1>
  
  <form method="POST" action="{{ route('penggunting.store_detail_ukuran', ['order_id' => $order->order_id]) }}">
    @csrf

    <div class="form-group">
      <label for="orders">ID Pesanan</label>
      <input type="text" id="orders" name="orders" value="{{ $order->order_id }}" readonly class="form-control">
    </div>

    <div class="form-group">
      <h3>Form Detail Ukuran:</h3>
      <!-- Baris 1 -->
      <div class="row">
        <div class="column">
          <label for="lingkar-dada">Lingkar Dada (cm):</label>
          <input type="number" id="lingkar-dada" name="lingkar_dada" min="0" step="0.1" required class="form-control" placeholder="Masukkan Lingkar Dada">
        </div>
        <div class="column">
          <label for="bahu">Bahu (cm):</label>
          <input type="number" id="bahu" name="bahu" min="0" step="0.1" required class="form-control" placeholder="Masukkan Bahu">
        </div>
      </div>

      <!-- Baris 2 -->
      <div class="row">
        <div class="column">
          <label for="pinggang">Pinggang (cm):</label>
          <input type="number" id="pinggang" name="pinggang" min="0" step="0.1" required class="form-control" placeholder="Masukkan Pinggang">
        </div>
        <div class="column">
          <label for="pinggul">Pinggul (cm):</label>
          <input type="number" id="pinggul" name="pinggul" min="0" step="0.1" required class="form-control" placeholder="Masukkan Pinggul">
        </div>
      </div>

      <!-- Baris 3 -->
      <div class="row">
        <div class="column">
          <label for="lengan">Lengan (cm):</label>
          <input type="number" id="lengan" name="lengan" min="0" step="0.1" required class="form-control" placeholder="Masukkan Lengan">
        </div>
        <div class="column">
          <label for="lingkar-pergelangan">Lingkar Pergelangan (cm):</label>
          <input type="number" id="lingkar-pergelangan" name="lingkar_pergelangan" min="0" step="0.1" required class="form-control" placeholder="Masukkan Lingkar Pergelangan">
        </div>
      </div>

      <!-- Baris 4 -->
      <div class="row">
        <div class="column">
          <label for="panjang-tangan">Panjang Tangan (cm):</label>
          <input type="number" id="panjang-tangan" name="panjang_tangan" min="0" step="0.1" required class="form-control" placeholder="Masukkan Panjang Tangan">
        </div>
        <div class="column">
          <label for="panjang-baju">Panjang Baju (cm):</label>
          <input type="number" id="panjang-baju" name="panjang_baju" min="0" step="0.1" required class="form-control" placeholder="Masukkan Panjang Baju">
        </div>
      </div>
      
    </div>

    <button type="submit" class="btn btn-primary">Selesai</button>
  </form>
</div>
@endsection
