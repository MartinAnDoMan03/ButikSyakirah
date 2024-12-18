@extends('layouts.layout')

@section('title', 'Stok Barang')

@section('content')

    <h1>Daftar Stok Barang</h1>

    <div class="add-stock-container">
        <button id="showFormButton">Tambah Barang Baru</button>
    </div>

    <div class="order-form" id="addStockForm" style="display: none;">   
        <h3>Tambah Stok Barang</h3>

        <select id="stockType" onchange="toggleStockForms(this.value)">
            <option value="select">Pilih Stock</option>
            <option value="new">Stock Baru</option>
            <option value="old">Stock Lama</option>
        </select>
    
        {{-- Form untuk menambah stok baru  --}}
        <div id="newStockForm" style="display:none;">
            <h3>Tambah Stok Barang</h3>
            <form action="{{ route('stock.store') }}" method="POST">
                @csrf
                <label for="supplier_id">Supplier:</label>
                <select id="supplier_id" name="supplier_id" >
                    <option value="" selected disabled>Pilih Supplier</option>
                    @foreach ($suppliers as $supplier)
                        <option value="{{ $supplier->supplier_id }}">{{ $supplier->supplier_name }}</option>
                    @endforeach
                </select>
    
                <label for="stock_type">Jenis Barang:</label>
                <select id="stock_type" name="stock_type" required>
                    <option value="" selected disabled>Pilih jenis barang</option>
                    <option value="cloth">Kain</option>
                    <option value="thread">Benang</option>
                </select>
    
                <label for="stock_name">Nama Barang:</label>
                <input type="text" id="stock_name" name="stock_name" required>
    
                <label for="quantity">Jumlah Stok:</label>
                <input type="number" id="quantity" name="quantity" step="1" required>
    
                <button type="submit">Tambahkan stok</button>
            </form>
        </div>
    
        {{-- Form untuk menambah stok ke barang lama  --}}
        <div id="oldStockForm" style="display:none;">
            <h3>Tambah Stok ke Barang Lama</h3>
            <form action="" method="POST">
                @csrf
                @method('PUT') 
                <label for="existing_stock_id">Pilih Barang:</label>
                <select id="existing_stock_id" name="stock_id" required>
                    <option value="" selected disabled>Pilih Barang</option>

                        <option value=""> stok tersedia</option>

                </select>
                
                <label for="additional_quantity">Jumlah Tambahan:</label>
                <input type="number" id="additional_quantity" name="additional_quantity" step="1" required>
    
                <button type="submit">Tambahkan Stok</button>
            </form>
        </div>
    </div>
    

   {{-- stock barang --}}
    <div class="search-container">
        <input type="text" placeholder="Search..." class="search-input">
        <button class="search-icon"><i class="zmdi zmdi-search"></i></button>
    </div>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Barang ID</th>
                    <th>Nama Barang</th>
                    <th>Jumlah Stok</th>
                    <th>Tanggal Masuk Terakhir</th>
                </tr>
            </thead>
            <tbody id="stockTableBody">
                <!-- Baris stok barang akan ditambahkan di sini -->
                @foreach ($stocks as $stock)
                <tr>
                <td>{{$stock->stock_id}}</td>
                <td>{{$stock->stock_name}}</td>
                <td>{{$stock->quantity}}</td>
                <td>{{$stock->last_updated}}</td>
            </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        function toggleStockForms(value) {
            const newStockForm = document.getElementById('newStockForm');
            const oldStockForm = document.getElementById('oldStockForm');

            newStockForm.style.display = 'none';
            oldStockForm.style.display = 'none';

            if (value === 'new') {
                newStockForm.style.display = 'block';
            } else if (value === 'old') {
                oldStockForm.style.display = 'block'; 
            }
        }
 
    </script>
@endsection
