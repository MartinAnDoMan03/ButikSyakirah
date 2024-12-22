

@extends('layouts.layoutpekerja')

@section('title', 'Edit Pesanan')

@section('content')

    <h1>Edit Pesanan</h1>

    <!-- Form Edit Pesanan -->
    <form action="{{ route('penggunting.update_pesanan', $order->order_id) }}" method="POST">
        @csrf
        @method('PUT')  <!-- Karena ini adalah update, kita gunakan PUT -->

        <div class="form-group">
            <label for="penjahit_id">Nama Penjahit</label>
            <select name="penjahit_id" id="penjahit_id" class="form-control">
                @foreach($penjahits as $penjahit)
                    <option value="{{ $penjahit->id }}" {{ $order->penjahit_id == $penjahit->id ? 'selected' : '' }}>
                        {{ $penjahit->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Pesanan</button>
    </form>

@endsection
