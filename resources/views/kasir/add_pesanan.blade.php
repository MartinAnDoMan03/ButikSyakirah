@extends('layouts.layout')

@section('title', 'Data Customer')

@section('content')
    <h1>Tambah Pesanan</h1>

    <!-- Form Input untuk Menambah Pesanan Baru -->
    <div class="order-form">
        <h3>Tambah Pesanan Baru</h3>
        <!-- Dropdown for customer type -->
        <select id="customerType" onchange="toggleCustomerForms(this.value)">
            <option value="select">Pilih Customer</option>
            <option value="new">Customer Baru</option>
            <option value="old">Customer Lama</option>
        </select>

        <!-- Form untuk customer baru -->
        <div  id="newCustomerForm" style="display:none;">
            <h3>Form Customer Baru</h3>
            <form  action="{{ route('customer.store') }}" method="POST">
                @csrf
                <label for="customer_name">Nama:</label>
                <input type="text" id="customer_name" name="customer_name" required>

                <label for="address">Alamat:</label>
                <input type="text" id="address" name="address" required>

                <label for="phone">Telepon:</label>
                <input type="text" id="phone" name="phone" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
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
        <form action="{{ route('order.store') }}" method="POST">
            @csrf
            <div id="oldCustomerFormContainer" style="display:none;">
                <label for="old_customer">Pilih Customer Lama</label>

                {{-- <label for="customer_name">ID:</label>
                <input type="text" id="oldeCustomer" name="customer_id" required><br><br> --}}
                <select id="oldCustomer" name="customer_id" required>
                    <option value="">Pilih Customer</option>
                    @foreach ($orders as $customer)
                        <option value="{{ $customer->customer_id }}">{{ $customer->customer_name }}</option>
                    @endforeach

                </select>

            </div>

            <div id="addOrders">
                <label for="orderDate">Tanggal Order:</label>
                <input type="date" id="orderDate" name="orderDate">

                <label for="finishDate">Tanggal Selesai:</label>
                <input type="date" id="finishDate" name="finishDate">
                <div>
                    <button type="submit">Tambahkan Pesanan</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        function toggleCustomerForms(value) {
            const newCustomerForm = document.getElementById('newCustomerForm');
            const oldCustomerFormContainer = document.getElementById('oldCustomerFormContainer');
            const orderDetails = document.getElementById('addOrders');

            // Hide both forms by default
            newCustomerForm.style.display = 'none';
            oldCustomerFormContainer.style.display = 'none';
            addOrders.style.display = 'none';

            // Show the form based on the selected type
            if (value === 'new') {
                newCustomerForm.style.display = 'block';
                orderDetails.style.display = 'none';
            } else if (value === 'old') {
                oldCustomerFormContainer.style.display = 'block';
                addOrders.style.display = 'block';
            }
        }
    </script>
@endsection