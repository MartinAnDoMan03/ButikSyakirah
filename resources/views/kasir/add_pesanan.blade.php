@extends('layouts.layout')

@section('title', 'Data Customer')

@section('content')
            <h1>Tambah Pesanan</h1>

            <!-- Form Input untuk Menambah Pesanan Baru -->
            <div class="order-form">
                <h3>Tambah Pesanan Baru</h3>
                <form id="addOrderForm">
                    <!-- Dropdown untuk memilih tipe customer -->
                    <select id="customerType">
                    <option value="select">Pilih Customer</option>
                    <option value="new">Customer Baru</option>
                    <option value="old">Customer Lama</option>
                    </select>

                    <!-- Form untuk customer baru -->
                    <div id="newCustomerForm" style="display:none;">
                    <h3>Form Customer Baru</h3>
                    <label for="customerName">Nama:</label>
                    <input type="text" id="customerName" name="customerName" required><br><br>
                    <label for="customerAddress">Alamat:</label>
                    <input type="text" id="customerAddress" name="customerAddress" required><br><br>
                    <label for="customerPhone">Telepon:</label>
                    <input type="text" id="customerPhone" name="customerPhone" required><br><br>
                    <label for="customerEmail">Email:</label>
                    <input type="email" id="customerEmail" name="customerEmail" required><br><br>
                    <button type="submit" id="submitNewCustomer" name="submitNewCustomer">Tambah Customer</button>
                    </div>

                    <!-- Form untuk customer lama -->
                    <div id="oldCustomerForm" style="display:none;">
                    <h3>Pilih Customer Lama</h3>
                    <select id="oldCustomer">
                        <option value="">Pilih Customer</option>
                        <!-- Data customer lama akan dimasukkan di sini -->
                    </select>
                    </div>
                    <label for="clothingType">Pilih Jenis Pakaian:</label>
                    <select id="clothingType">
                        <option value="" selected disabled>Pilih Pakaian</option>

                        <!-- Jenis Pakaian dengan value yang berbeda -->
                        <option value="shirt_men_long">Kemeja Pria lengan panjang</option>
                        <option value="shirt_women_long">Kemeja Wanita lengan panjang</option>
                        <option value="shirt_kids_long">Kemeja anak lengan panjang</option>
                        <option value="shirt_men_short">Kemeja Pria lengan pendek</option>
                        <option value="shirt_women_short">Kemeja Wanita lengan pendek</option>
                        <option value="shirt_kids_short">Kemeja anak lengan pendek</option>

                        <option value="shirt_men_no_collar_long">Kemeja Pria tidak berkerah lengan panjang</option>
                        <option value="shirt_women_no_collar_long">Kemeja Wanita tidak berkerah lengan panjang</option>
                        <option value="shirt_kids_no_collar_long">Kemeja anak tidak berkerah lengan panjang</option>
                        <option value="shirt_men_no_collar_short">Kemeja Pria tidak berkerah lengan pendek</option>
                        <option value="shirt_women_no_collar_short">Kemeja Wanita tidak berkerah lengan pendek</option>
                        <option value="shirt_kids_no_collar_short">Kemeja anak tidak berkerah lengan pendek</option>

                        <option value="gamis">Gamis</option>
                        <option value="kebaya">Kebaya</option>
                        <option value="skirt_long">Rok panjang</option>
                        <option value="skirt_short">Rok pendek</option>
                        <option value="pants_men">Celana panjang pria</option>
                        <option value="pants_women">Celana panjang wanita</option>
                        <option value="pants_men_short">Celana pendek pria</option>
                        <option value="pants_women_short">Celana pendek wanita</option>
                    </select>

                    <div >
                        <label for="price">Harga :</label>
                        <input type="text" id="price" readonly>
                    </div>


                    <label for="orderDate">Tanggal Order:</label>
                    <input type="date" id="orderDate" required>

                    <label for="finishDate">Tanggal Selesai:</label>
                    <input type="date" id="finishDate">
                    <div>

                    <button type="submit">Tambahkan Pesanan</button>
                </form>
            </div> 
@endsection