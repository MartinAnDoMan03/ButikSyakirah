@extends('layouts.layout')

@section('title', 'Data Pesanan')

@section('content')

    <h1>Daftar Pesanan</h1>

    <!-- Tabel Pesanan -->
    <div class="search-faktur-container">
        <button class="btn-create-faktur">Buat Faktur</button>
        <div class="search-input-wrapper">
            <input type="text" placeholder="Search..." class="search-input2">
            <button class="search-icon2"><i class="zmdi zmdi-search"></i></button>
        </div>
    </div>  
    <div class="table-container">
        <table>
            <thead>
                <tr class ="addpesanan">
                    <th>No </th>
                    <th>Nama Pelanggan</th>
                    <th>Tanggal Order</th>
                    <th>Tanggal Selesai</th>
                    <th>Total Biaya</th>
                    <th>Menu</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody id="orderTableBody">
                @forelse ($orders as $order)
                <tr>
                    <td>{{ $order->order_id }}</td>
                    <td>{{ $order->customer_name }}</td>
                    <td>{{ $order->order_date }}</td>
                    <td>{{ $order->completion_date }}</td>
                    <td>{{ number_format($order->price, 0, ',', '.') }}</td>
                    <td class="menu-buttons">
                        <!-- Tombol Edit -->
                        <a href="{{ url('edit-pesanan/'.$order->order_id) }}" class="btn btn-edit" title="Edit">
                            <i class="fa fa-edit"></i>
                        </a>
                    
                        <!-- Tombol Add Detail Pesanan -->
                        <a href="javascript:void(0)" class="btn btn-add-detail" title="Add Detail Pesanan" onclick="openDetailModal()">
                            <i class="fa fa-file-alt"></i> 
                        </a>                                            
                    
                        <!-- Tombol Detail Ukuran -->
                        <a href="{{ url('detail-ukuran/'.$order->order_id) }}" class="btn btn-detail-ukuran" title="Detail Ukuran">
                            <i class="fa fa-eye"></i>
                        </a>
                    </td>                     
                    <td>{{ $order->status }}</td>
                </tr>
                @empty

                @endforelse
            </tbody>
        </table>
    </div>

<!-- Modal untuk Form Detail Pesanan -->
<div id="detailModal" class="modal" style="display: none;">
    <div class="modal-content">
        <span class="close-btn" onclick="closeDetailModal()">&times;</span>
        
        <h2>Detail Pesanan</h2>
        <form class="detail-form" action="{{ url('add-detail-pesanan') }}" method="POST">
            @csrf

            <!-- Jenis Baju -->
            <div>
                <label for="clothingType">Jenis Baju:</label>
                <select id="clothingType" name="clothingType" onchange="updatePrice()">
                    <option value="" disabled selected>Pilih Jenis Baju</option>
                    <option value="kemeja-lengan-panjang-pria">Kemeja Lengan Panjang Pria</option>
                    <option value="kemeja-lengan-pendek-pria">Kemeja Lengan Pendek Pria</option>
                    <option value="gamis-wanita">Gamis Wanita</option>
                    <option value="rok-panjang-wanita">Rok Panjang Wanita</option>
                    <option value="rok-pendek-wanita">Rok Pendek Wanita</option>
                    <option value="kebaya">Kebaya</option>
                    <option value="kemeja-lengan-panjang-anak">Kemeja Lengan Panjang Anak</option>
                    <option value="kemeja-lengan-pendek-anak">Kemeja Lengan Pendek Anak</option>
                    <option value="gamis-anak">Gamis Anak</option>
                    <option value="jas">Jas</option>
                    <option value="custom">Custom</option>
                </select>
            </div>

            <!-- Harga Baju -->
            <div style="margin-top: 20px;">
                <label for="priceInput">Harga:</label>
                <input type="text" id="priceInput" name="priceInput" placeholder="Harga akan tampil di sini" readonly>
            </div>

            <!-- Pilih Kain Toko -->
            <div>
                <label for="storeFabric">Kain Toko:</label>
                <select id="storeFabric" name="storeFabric" onchange="updateFabricPrice()">
                    <option value="" disabled selected>Pilih Kain Toko</option>
                    <option value="katun">Katun - Rp 50,000/m</option>
                    <option value="sutra">Sutra - Rp 100,000/m</option>
                    <option value="wolfis">Wolfis - Rp 75,000/m</option>
                </select>
            </div>

            <div>
                <label for="fabricPrice">Harga Kain (per meter):</label>
                <input type="text" id="fabricPrice" readonly />
            </div>

            <div>
                <label for="fabricLength">Ukuran Kain (meter):</label>
                <input type="number" id="fabricLength" min="0" step="0.1" onchange="calculateFabricCost()" />
            </div>

            <div>
                <label for="totalFabricPrice">Total Harga Kain:</label>
                <input type="text" id="totalFabricPrice" readonly />
            </div>

            <div>
                <label for="FabricCustomer">Tambahan Kain Customer :</label>
                <input type="text" id="FabricCustomer">
            </div>

            <!-- Payet -->
            <div>
                <label for="payetCode">Payet:</label>
                <select id="payetCode" name="payetCode" onchange="calculateTotalPrice()">
                    <option value="no">Tidak</option>
                    <option value="yes">Tambah payet</option>
                </select>
            </div>

            {{-- Harga Payet dimasukkan manual --}}
            <div>
                <label for="payetPrice">Harga Payet:</label>
                <input type="text" id="payetPrice" name="payetPrice" placeholder="Masukkan Harga Payet" onchange="calculateTotalPrice()" />
            </div>

            <div>
                <label for="notesCustom">Catatan Tambahan:</label>
                <textarea name="notes" id="notesCustomer" cols="30" rows="10" placeholder="Tambah catatan pesanan"></textarea>
            </div>

            {{-- Total Harga --}}
            <div>
                <label for="totalPrice">Total Harga:</label>
                <input type="text" id="totalPrice" name="totalPrice" readonly />
            </div>

            <div style="margin-top: 20px;">
                <button  class="sv-detail" type="submit">Simpan</button>
            </div>
        </form>
    </div>
</div>

@endsection