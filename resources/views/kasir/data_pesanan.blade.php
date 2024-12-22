@extends('layouts.layout')

@section('title', 'Data Pesanan')

@section('content')

    <h1>Daftar Pesanan</h1>

    <!-- Tabel Pesanan -->
    <div class="search-faktur-container">
        <div class="search-input-wrapper">
            <form action="{{ route('search.pesanan') }}" method="GET">
                <input type="text" name="query" placeholder="" class="search-input2" value="{{ request('query') }}">
                <button type="submit" class="search-icon2"><i class="zmdi zmdi-search"></i></button>
            </form>
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
                        <td>{{ $order->customer_name}}</td>
                        <td>{{ $order->order_date }}</td>
                        <td>{{ $order->completion_date }}</td>
                        <td>{{ number_format($order->price, 0, ',', '.') }}</td>
                        <td class="menu-buttons">
                            <!-- Tombol Edit -->
                            <a href="{{ route('orders.edit', $order->order_id) }}" class="btn btn-edit" title="Edit">
                                <i class="fa fa-edit"></i>
                            </a>


                            <!-- Tombol Add Detail Pesanan -->
                            <a href="javascript:void(0)" class="btn btn-add-detail" title="Add Detail Pesanan"
                                onclick="openDetailModal()">
                                <i class="fa fa-file-alt"></i>
                            </a>

                            <!-- Tombol Detail Ukuran -->
                            <a href="javascript:void(0)" class="btn btn-detail-ukuran" title="Detail Ukuran"
                                onclick="openDetailUkuranModal({{ $order->order_id }})">
                                <i class="fa fa-eye"></i>
                            </a>
                        </td>
                        <td>{{ $order->status }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">Tidak ada data ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Modal untuk Form Detail Pesanan -->
    <div id="detailModal" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="close-btn" onclick="closeDetailModal()">&times;</span>

            <h2>Detail Pesanan</h2>
            <form class="detail-form" action="{{ url('kasir.addDetail') }}" method="POST">
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
                    <input type="text" id="priceInput" name="priceInput" placeholder="Harga akan tampil di sini"
                        readonly>
                </div>

                <!-- Pilih Kain Toko -->
                <div>
                    <label for="storeFabric">Kain Toko:</label>
                    <select id="storeFabric" name="storeFabric" onchange="updateFabricPrice()">
                        <option value="" disabled selected>Pilih Kain Toko</option>
                        <option value="katun">Katun </option>
                        <option value="sutra">Sutra </option>
                        <option value="wolfis">Wolfis</option>
                    </select>
                </div>

                <div>
                    <label for="fabricPrice">Harga Kain (per meter):</label>
                    <input type="text" id="fabricPrice" readonly />
                </div>

                <div>
                    <label for="fabricLength">Ukuran Kain (meter):</label>
                    <input type="number" id="fabricLength" min="0" step="0.1"
                        onchange="calculateFabricCost()" />
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
                    <input type="text" id="payetPrice" name="payetPrice" placeholder="Masukkan Harga Payet"
                        onchange="calculateTotalPrice()" />
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
                    <button class="sv-detail" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <div class="modal-detail-ukuran" id="detailUkuranModal" style="display: none;">
        <div class="modal-content-detail-ukuran">
            <span class="close-btn-detail-ukuran" onclick="closeDetailUkuranModal()">&times;</span>

            <h2>Detail Ukuran</h2>
            <table class="detail-ukuran-table">
                <thead>
                    <tr>
                        <th>Detail Ukuran</th>
                        <th>Nilai (cm)</th>
                    </tr>
                </thead>
                <tbody id="sizeDetailsTable">
                    <tr>
                        <td><strong>Lingkar Dada</strong></td>
                        <td id="lingkarDada">-</td>
                    </tr>
                    <tr>
                        <td><strong>Lingkar Pinggang</strong></td>
                        <td id="lingkarPinggang">-</td>
                    </tr>
                    <tr>
                        <td><strong>Lingkar Lengan</strong></td>
                        <td id="lingkarLengan">-</td>
                    </tr>
                    <tr>
                        <td><strong>Panjang Tangan</strong></td>
                        <td id="panjangTangan">-</td>
                    </tr>
                    <tr>
                        <td><strong>Lebar Bahu</strong></td>
                        <td id="lebarBahu">-</td>
                    </tr>
                    <tr>
                        <td><strong>Pinggul</strong></td>
                        <td id="pinggul">-</td>
                    </tr>
                    <tr>
                        <td><strong>Lingkar Pergelangan</strong></td>
                        <td id="lingkarPergelangan">-</td>
                    </tr>
                    <tr>
                        <td><strong>Panjang Baju</strong></td>
                        <td id="panjangBaju">-</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
    <script>
        function openDetailUkuranModal(orderId) {
            const modal = document.getElementById('detailUkuranModal');
            modal.style.display = 'block';

            // Clear previous data
            const fields = ['lingkarDada', 'lingkarPinggang', 'lingkarLengan', 'panjangTangan', 'lebarBahu', 'pinggul',
                'lingkarPergelangan', 'panjangBaju'
            ];
            fields.forEach(field => {
                document.getElementById(field).textContent = '-';
            });

            // Fetch size details
            fetch(`/detail-ukuran/${orderId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        alert(data.error);
                        return;
                    }

                    // Populate the modal with size details
                    document.getElementById('lingkarDada').textContent = data.lingkar_dada || '-';
                    document.getElementById('lingkarPinggang').textContent = data.lingkar_pinggang || '-';
                    document.getElementById('lingkarLengan').textContent = data.lingkar_lengan || '-';
                    document.getElementById('panjangTangan').textContent = data.panjang_tangan || '-';
                    document.getElementById('lebarBahu').textContent = data.lebar_bahu || '-';
                    document.getElementById('pinggul').textContent = data.pinggul || '-';
                    document.getElementById('lingkarPergelangan').textContent = data.lingkar_pergelangan || '-';
                    document.getElementById('panjangBaju').textContent = data.panjang_baju || '-';
                })
                .catch(error => {
                    console.error('Error fetching size details:', error);
                    alert('Failed to fetch size details.');
                });
        }
    </script>


@endsection
