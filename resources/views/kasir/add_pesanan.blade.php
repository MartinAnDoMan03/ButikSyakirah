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
        <form action="{{route('order.store')}}">
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
                    const customers =
                    @json($orders); // Mengambil data customer dari controller (dalam format JSON)

                    const customerTypeDropdown = document.getElementById("customerType");
                    const newCustomerForm = document.getElementById("newCustomerForm");
                    const oldCustomerFormContainer = document.getElementById("oldCustomerFormContainer");
                    const oldCustomerDropdown = document.getElementById("oldCustomer");

                    // Fungsi untuk menampilkan form sesuai pilihan
                    customerTypeDropdown.addEventListener("change", function() {
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
                            oldCustomerDropdown.innerHTML =
                            `<option value="">Pilih Customer</option>`; // Reset dropdown

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


            <label for="orderDate">Tanggal Order:</label>
            <input type="date" id="orderDate" name="orderDate" required>

            <label for="finishDate">Tanggal Selesai:</label>
            <input type="date" id="finishDate" name="finishDate">
            <div>

                <button type="submit">Tambahkan Pesanan</button>
            </div>
    </div>
    </form>
@endsection
