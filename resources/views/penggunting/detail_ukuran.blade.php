// penggunting/detail_ukuran.blade.php
@extends('layouts.layoutpekerja')

@section('title', 'Detail Ukuran')

@section('content')
<div class="container2">
  <h1>Detail Ukuran</h1>
  <form method="POST" action="{{ route('store.size.detail', ['order_detail_id' => $order_details->order_detail_id]) }}">
    @csrf
    <div class="form-group">
      <label for="order_detail_id">Select Order Detail</label>
      <select id="order_detail_id" name="order_detail_id" class="form-control">
          @foreach ($order_details as $order_detail)
              <option value="{{ $order_detail->order_detail_id }}">
                  {{ $order_detail->order_detail_id }} - {{ $order_detail->note }} - {{ $order_detail->order_date }}
              </option>
          @endforeach
      </select>
  </div>

    <div class="form-group">
      <h3>Form Detail Ukuran:</h3>
      <!-- Baris 1 -->
      <div class="row">
        <div class="column">
          <label for="lingkar-dada">Lingkar Dada (cm):</label>
          <input type="number" id="chest_circumference" name="chest_circumference" min="0" step="0.1" required class="form-control">
        </div>
        <div class="row">
          <div class="column">
            <label for="pinggang">Lingkar Pinggang (cm):</label>
            <input type="number" id="waist_circumference" name="waist_circumference" min="0" step="0.1" required class="form-control">
          </div>
        <div class="column">
          <label for="bahu">Lingkar Tangan (cm):</label>
          <input type="number" id="arm_circumference" name="arm circumference" min="0" step="0.1" required class="form-control">
        </div>
      </div>
        <div class="column">
          <label for="pinggul">Panjang Tangan (cm):</label>
          <input type="number" id="arm_length" name="arm_length" min="0" step="0.1" required class="form-control">
        </div>
      </div>
      <!-- Baris 3 -->
      <div class="row">
        <div class="column">
          <label for="lengan">Lebar Bahu (cm):</label>
          <input type="number" id="shoulder_width" name="shoulder_width" min="0" step="0.1" required class="form-control">
        </div>
        <div class="column">
          <label for="lengan">pinggul (cm):</label>
          <input type="number" id="hip" name="hip" min="0" step="0.1" required class="form-control">
        </div>
        <div class="column">
          <label for="lingkar-pergelangan">Lingkar Pergelangan Tangan (cm):</label>
          <input type="number" id="lingkar-wrist_circumference" name="wrist_circumference" min="0" step="0.1" required class="form-control">
        </div>
      </div>
      <!-- Baris 4 -->
        <div class="column">
          <label for="panjang-baju">Panjang Baju (cm):</label>
          <input type="number" id="clothes_length" name="clothes_length" min="0" step="0.1" required class="form-control">
        </div>
      </div>
      
    </div>

    <button type="submit" class="btn btn-primary">Selesai</button>
  </form>
</div>
@endsection