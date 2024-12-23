    @extends('layouts.layoutPekerja')

    @section('title', 'Data Customer')

    @section('content')
        <h1>Tambah Pesanan</h1>

        <!-- Form Input untuk Menambah Pesanan Baru -->
        <div class="order-form">
            <h3>Tambah Pesanan Baru</h3>

            <div id="newCustomerForm" style="display:block;">
                <h3>Form Penjahit</h3>
                <form action="{{ route('seam.store') }}" method="POST">
                    @csrf
                    <div id="oldCustomerFormContainer" style="display:block;">
                        <label for="order_detail_id">Pilih ID Detail</label>
                        <select id="order_detail_id" name="order_detail_id" required>
                            <option value="">Pilih ID Detail</option>
                            @foreach ($order_details as $customer)
                            <option value="{{ $customer->order_detail_id }}">{{ $customer->order_detail_id }}</option>
                            @endforeach
                        </select>
                    </div>

                    <label for="seam_name">Nama jahitan : </label>
                    <input type="text" id="seam_name" name="seam_name" required>

                    <div class="edit-order-group">
                        <label for="cloth_type" class="edit-order-label">Kain Toko:</label>
                        <select id="cloth_type" name="cloth_type" class="edit-order-input">
                            <option value="" disabled selected>Pilih Kain Toko</option>
                            <option value="katun">Katun</option>
                            <option value="sutra">Sutra</option>
                            <option value="wolfis">Wolfis</option>
                        </select>
                    </div>

                    <div id="oldCustomerFormContainer" style="display:block;">
                        <label for="seamer_id">Pilih ID Penjahit</label>
                        <select id="seamer_id" name="seamer_id" required>
                            <option value="">Pilih Penjahit</option>
                            @foreach ($penjahits as $penjahit)
                                <option value="{{ $penjahit->user_id }}">{{ $penjahit->name }}</option>
                            @endforeach
                        </select>
                        
                    </div>

                    <label for="seam_size">Ukuran jahitan : </label>
                    <input type="number" id="seam_size" name="seam_size" required>

                    <div class="edit-order-group">
                        <label for="seam_status" class="edit-order-label">Status Jahitan :</label>
                        <select id="seam_status" name="seam_status" class="edit-order-input">
                            <option value="" disabled selected>Pilih Status Jahitan</option>
                            <option value="Belum-Selesai">Belum-Selesai</option>
                            <option value="Selesai">Selesai</option>
                        </select>
                        
                    </div>
                    @if ($errors->any())
                        <div>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <button type="submit" class="btn btn-primary">Selesai</button>
                </form>
            </div>


        @endsection
