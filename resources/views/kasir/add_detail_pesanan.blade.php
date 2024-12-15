@extends('layouts.layout')

@section('title', 'Data Customer')

@section('content')
    <h1>Tambah Detail Pesanan</h1>
    <form action="">
        @csrf
        <label for="clothingType">Pilih Jenis Pakaian:</label>
        <select id="clothingType">
            <option value="" selected disabled>Pilih Pakaian</option>

            <!-- Jenis Pakaian dengan value yang berbeda -->
            <option value="Kemeja Pria lengan panjang">Kemeja Pria lengan panjang</option>
            <option value="Kemeja Wanita lengan panjang">Kemeja Wanita lengan panjang</option>
            <option value="Kemeja anak lengan panjang">Kemeja anak lengan panjang</option>
            <option value="Kemeja Pria lengan pendek">Kemeja Pria lengan pendek</option>
            <option value="Kemeja Wanita lengan pendek">Kemeja Wanita lengan pendek</option>
            <option value="Kemeja anak lengan pendek">Kemeja anak lengan pendek</option>

            <option value="Kemeja Pria tidak berkerah lengan panjang">Kemeja Pria tidak berkerah lengan panjang</option>
            <option value="Kemeja Wanita tidak berkerah lengan panjang">Kemeja Wanita tidak berkerah lengan panjang</option>
            <option value="shirt_kids_no_collar_long">Kemeja anak tidak berkerah lengan panjang</option>
            <option value="Kemeja anak tidak berkerah lengan panjang">Kemeja Pria tidak berkerah lengan pendek</option>
            <option value="Kemeja Wanita tidak berkerah lengan pendek">Kemeja Wanita tidak berkerah lengan pendek</option>
            <option value="Kemeja anak tidak berkerah lengan pendek">Kemeja anak tidak berkerah lengan pendek</option>

            <option value="Gamis">Gamis</option>
            <option value="Kebaya">Kebaya</option>
            <option value="Rok panjang">Rok panjang</option>
            <option value="Rok pendek">Rok pendek</option>
            <option value="Celana panjang pria">Celana panjang pria</option>
            <option value="Celana panjang wanita">Celana panjang wanita</option>
            <option value="Celana pendek pria">Celana pendek pria</option>
            <option value="Celana pendek wanita">Celana pendek wanita</option>
        </select>

        <div>
            <label for="price">Harga :</label>
            <input type="text" id="price" readonly>
        </div>

        <div>

            <button type="submit">Tambahkan Pesanan</button>
        </div>
        </div>
    </form>
@endsection
