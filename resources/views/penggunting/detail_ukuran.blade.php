@extends('layouts.layoutpekerja')

@section('title', 'Detail Ukuran')

@section('content')
<div class="container2">
    <h1>Detail Ukuran</h1>
    <form action="{{ route('order.addUkuran') }}" method="POST">
        @csrf
        <div id="oldCustomerFormContainer" style="display:block;">
            <label for="order_detail_id">Pilih ID detail</label>
            <select id="order_detail_id" name="order_detail_id" required>
                <option value="">Pilih ID detail</option>
                @foreach ($order_details as $customer)
                    <option value="{{ $customer->order_detail_id }}">{{ $customer->order_detail_id }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <h3>Form Detail Ukuran:</h3>
            <!-- Baris 1 -->
            <div class="row">
                <div class="column">
                    <label for="chest_circumference">Lingkar Dada (cm):</label>
                    <input type="number" id="chest_circumference" name="chest_circumference" min="0"
                        step="0.1" class="form-control" required>
                </div>
                <div class="column">
                    <label for="shoulder_width">Bahu (cm):</label>
                    <input type="number" id="shoulder_width" name="shoulder_width" min="0" step="0.1"
                        class="form-control" required>
                </div>
            </div>
            <!-- Baris 2 -->
            <div class="row">
                <div class="column">
                    <label for="waist_circumference">Pinggang (cm):</label>
                    <input type="number" id="waist_circumference" name="waist_circumference" min="0"
                        step="0.1" class="form-control" required>
                </div>
                <div class="column">
                    <label for="hip">Pinggul (cm):</label>
                    <input type="number" id="hip" name="hip" min="0" step="0.1" 
                        class="form-control" required>
                </div>
            </div>
            <!-- Baris 3 -->
            <div class="row">
                <div class="column">
                    <label for="arm_circumference">Lengan (cm):</label>
                    <input type="number" id="arm_circumference" name="arm_circumference" min="0"
                        step="0.1" class="form-control" required>
                </div>
                <div class="column">
                    <label for="wrist_circumference">Lingkar Pergelangan (cm):</label>
                    <input type="number" id="wrist_circumference" name="wrist_circumference" min="0"
                        step="0.1" class="form-control" required>
                </div>
            </div>
            <!-- Baris 4 -->
            <div class="row">
                <div class="column">
                    <label for="arm_length">Panjang Tangan (cm):</label>
                    <input type="number" id="arm_length" name="arm_length" min="0" step="0.1" 
                        class="form-control" required>
                </div>
                <div class="column">
                    <label for="shoulder_length">Panjang Bahu (cm):</label>
                    <input type="number" id="shoulder_length" name="shoulder_length" min="0" step="0.1"
                        class="form-control" required>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Selesai</button>
    </form>
</div>
@endsection