@extends('layouts.layoutjahit')

@section('title', 'Data Pesanan')

@section('content')
    <!-- Header -->
    <h1>Data Pesanan</h1>

    <!-- Tombol Navigasi -->
    <div class="navigation-container">
        <button class="btn btn-primary" id="loadBarang">Barang yang dipakai</button>
    </div>

    <!-- Form Barang (Tersembunyi) -->
    <div id="contentBarang">
        <h2>Barang Dipakai</h2>
        <form>
            <div>
                <label for="stokBarang">Barang yang Dipakai:</label>
                <select id="stokBarang" name="stokBarang">
                    <option value="" disabled selected>Pilih Barang</option>
                    <option value="katun">Katun - Rp 50,000/m</option>
                    <option value="sutra">Sutra - Rp 100,000/m</option>
                    <option value="wolfis">Wolfis - Rp 75,000/m</option>
                </select>
            </div>
            <div>
                <label for="jumlahBarang">Jumlah barang yang dipakai:</label>
                <input type="number" id="jumlahBarang" min="0" step="0.1" />
            </div>
            <button type="submit" class="btn">Simpan</button>
        </form>
    </div>

    <!-- Tabel Data Pesanan -->
    <div>
        <table>
        <thead>
                <tr>
                    <th>Customer ID</th>
                    <th>Nama Customer</th>
                    <th>Detail Ukuran</th>
                    <th>Nama Penjahit</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody id="customerTableBody">
                <td>2</td>
                <td>3</td>
                <td>4</td>
                <td>5</td>
                <td>
                    <select name="status" class="status-dropdown">
                            <option value="diproses">Diproses</option>
                            <option value="selesai_diproses">Selesai Diproses</option>
                            <option value="selesai">Selesai</option>
                    </select>
                </td>
                <!-- Baris customer akan ditambahkan di sini -->
            </tbody>
        </table>
    </div>

    <!-- Tempat untuk menampilkan form barang -->
    <div id="contentBarang"></div>

@endsection
