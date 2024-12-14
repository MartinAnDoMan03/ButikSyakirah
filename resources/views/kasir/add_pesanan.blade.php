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
        </form>

        <!-- Form untuk customer baru -->
        <div id="newCustomerForm" style="display:none;">
            <h3>Form Customer Baru</h3>
            <form action="{{ route('customer.store') }}" method="POST">
                @csrf
                <label for="customer_name">Nama:</label>
                <input type="text" id="customer_name" name="customer_name" required><br><br>

                <label for="address">Alamat:</label>
                <input type="text" id="address" name="address" required><br><br>

                <label for="phone">Telepon:</label>
                <input type="text" id="phone" name="phone" required><br><br>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br><br>
                @if ($errors->any())
                    <div>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <button type="submit" id="submitNewCustomer" name="submitNewCustomer">Tambah Customer</button>
            </form>
        </div>

        <!-- Form untuk customer lama -->
        <div id="oldCustomerFormContainer" style="display:none;">
            <label for="old_customer">Pilih Customer Lama</label>
            <select id="oldCustomer">
                <option value="">Pilih Customer</option>
                <!-- Data customer lama akan dimasukkan di sini -->
            </select>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", () => {
                // Ambil data pelanggan yang sudah dikirim oleh controller
                const customers = @json($orders); // Mengambil data customer dari controller (dalam format JSON)
                
                const customerTypeDropdown = document.getElementById("customerType");
                const newCustomerForm = document.getElementById("newCustomerForm");
                const oldCustomerFormContainer = document.getElementById("oldCustomerFormContainer");
                const oldCustomerDropdown = document.getElementById("oldCustomer");

                // Fungsi untuk menampilkan form sesuai pilihan
                customerTypeDropdown.addEventListener("change", function () {
                    const selectedType = this.value;

                    // Sembunyikan form dulu
                    newCustomerForm.style.display = "none";
                    oldCustomerFormContainer.style.display = "none";

                    // Menampilkan form yang sesuai dengan pilihan
                    if (selectedType === "new") {
                        newCustomerForm.style.display = "block";
                    } else if (selectedType === "old") {
                        oldCustomerFormContainer.style.display = "block";

                        // Mengisi dropdown customer lama dengan data yang diterima
                        oldCustomerDropdown.innerHTML = `<option value="">Pilih Customer</option>`; // Reset dropdown

                        customers.forEach(customer => {
                            const option = document.createElement("option");
                            option.value = customer.id;
                            option.textContent = customer.customer_name;
                            oldCustomerDropdown.appendChild(option);
                        });
                    }
                });
            });
        </script>

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

        <div>
            <label for="price">Harga :</label>
            <input type="text" id="price" readonly>
        </div>

        <label for="orderDate">Tanggal Order:</label>
        <input type="date" id="orderDate" required>

        <label for="finishDate">Tanggal Selesai:</label>
        <input type="date" id="finishDate">
        <div>

            <button type="submit">Tambahkan Pesanan</button>
        </div>
    </div>
@endsection
