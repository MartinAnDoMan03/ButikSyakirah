@extends('layouts.layoutpekerja')

@section('title', 'Detail Ukuran')

@section('content')
<div class="container">
  <h1>Detail Ukuran</h1>
  <form method="POST">
    @csrf
    <div class="form-group">
      <label for="customer">Nama Customer/ID Customer:</label>
      <input type="text" id="customer" name="customer" required>
    </div>
    <div class="form-group">
      <h3>Form Detail Ukuran:</h3>
      <div class="form-group">
          <label for="lingkar-dada">Lingkar Dada (cm):</label>
          <input type="number" id="lingkar-dada" name="lingkar_dada" min="0" step="0.1" required>
      </div>
      <div class="form-group">
          <label for="bahu">Bahu (cm):</label>
          <input type="number" id="bahu" name="bahu" min="0" step="0.1" required>
      </div>
      <div class="form-group">
          <label for="pinggang">Pinggang (cm):</label>
          <input type="number" id="pinggang" name="pinggang" min="0" step="0.1" required>
      </div>
      <div class="form-group">
          <label for="pinggul">Pinggul (cm):</label>
          <input type="number" id="pinggul" name="pinggul" min="0" step="0.1" required>
      </div>
      <div class="form-group">
          <label for="lengan">Lengan (cm):</label>
          <input type="number" id="lengan" name="lengan" min="0" step="0.1" required>
      </div>
      <div class="form-group">
          <label for="lingkar-pergelangan">Lingkar Pergelangan (cm):</label>
          <input type="number" id="lingkar-pergelangan" name="lingkar_pergelangan" min="0" step="0.1" required>
      </div>
      <div class="form-group">
          <label for="panjang-tangan">Panjang Tangan (cm):</label>
          <input type="number" id="panjang-tangan" name="panjang_tangan" min="0" step="0.1" required>
      </div>
      <div class="form-group">
          <label for="panjang-baju">Panjang Baju (cm):</label>
          <input type="number" id="panjang-baju" name="panjang_baju" min="0" step="0.1" required>
      </div>
    </div>
    {{-- <div class="form-group">
      <label for="kain_pelanggan">Kain dari Pelanggan (Meter):</label>
      <input type="number" id="kain_pelanggan" name="kain_pelanggan" min="0" step="0.1" required>
    </div>
    <div class="form-group">
      <label for="kain_butik">Kain dari Butik (Meter):</label>
      <input type="number" id="kain_butik" name="kain_butik" min="0" step="0.1" required>
    </div> --}}
    <button type="submit">Selesai</button>
  </form>
</div>
@endsection
