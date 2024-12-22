@extends('layouts.layout')

@section('title', 'Tambah Detail Pesanan')

@section('content')
    <div class="edit-order-container">
        <h1 class="edit-order-title">Tambah Detail Pesanan</h1>

        <!-- Add Detail Form -->
        <form action="{{ route('order.addDetail', ['order_id' => $order->order_id]) }}" method="POST">
            @csrf

            <!-- Order ID -->
            <input type="hidden" name="order_id" value="{{ $order->order_id }}">

            <!-- Order Type -->
            <div class="edit-order-group">
                <label for="order_type" class="edit-order-label">Jenis Baju:</label>
                <select id="order_type" name="order_type" class="edit-order-input" required>
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

            <!-- Customer Cloth -->
            <div class="edit-order-group">
                <label for="customer_cloth" class="edit-order-label">Tambahan Kain Customer :</label>
                <input type="text" id="customer_cloth" name="customer_cloth" class="edit-order-input">
            </div>

            <!-- Store Cloth Type -->
            <div class="edit-order-group">
                <label for="store_cloth_type" class="edit-order-label">Kain Toko:</label>
                <select id="store_cloth_type" name="store_cloth_type" class="edit-order-input">
                    <option value="" disabled selected>Pilih Kain Toko</option>
                    <option value="katun">Katun</option>
                    <option value="sutra">Sutra</option>
                    <option value="wolfis">Wolfis</option>
                </select>
            </div>

            <!-- Store Cloth Length -->
            <div class="edit-order-group">
                <label for="store_cloth_length" class="edit-order-label">Ukuran Kain (meter):</label>
                <input type="number" id="store_cloth_length" class="edit-order-input" name="store_cloth_length"
                    min="0" step="0.1" />
            </div>

            <!-- Sequin -->
            <div class="edit-order-group">
                <label for="sequin" class="edit-order-label">Payet:</label>
                <select id="sequin" name="sequin" class="edit-order-input">
                    <option value="no">Tidak</option>
                    <option value="yes">Tambah payet</option>
                </select>
            </div>

            <div class="edit-order-group">
                <label for="sequin_price" class="edit-order-label">Harga Payer : </label>
                <input type="number" id="sequin_price" class="edit-order-input" name="sequin_price"
                    min="0" step="500" />
            </div>

            <!-- Price -->
            <div class="edit-order-group">
                <label for="price" class="edit-order-label">Total Harga:</label>
                {{-- <input type="text" id="price" name="price" class="edit-order-input" readonly /> --}}
                <input type="hidden" id="hidden_price" name="price">
                <input type="text" id="price" class="edit-order-input" readonly>
            </div>

            <!-- Note -->
            <div class="edit-order-group">
                <label for="note" class="edit-order-label">Catatan Tambahan:</label>
                <textarea name="note" id="note" class="edit-order-input" cols="30" rows="10"
                    placeholder="Tambah catatan pesanan"></textarea>
            </div>

            <!-- Submit Button -->
            <div class="edit-order-group">
                <button type="submit" class="edit-order-button">Tambah Detail</button>
            </div>
        </form>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
    // Element references
    const orderTypeSelect = document.getElementById('order_type');
    const storeClothTypeSelect = document.getElementById('store_cloth_type');
    const storeClothLengthInput = document.getElementById('store_cloth_length');
    const priceInput = document.getElementById('price');
    const hiddenPriceInput = document.getElementById('hidden_price');
    const sequinPriceInput = document.getElementById('sequin_price');

    // Prices
    const prices = {
        "kemeja-lengan-panjang-pria": 100000,
        "kemeja-lengan-pendek-pria": 80000,
        "gamis-wanita": 120000,
        "rok-panjang-wanita": 90000,
        "rok-pendek-wanita": 75000,
        "kebaya": 150000,
        "kemeja-lengan-panjang-anak": 70000,
        "kemeja-lengan-pendek-anak": 60000,
        "gamis-anak": 100000,
        "jas": 200000,
        "custom": 0
    };

    const fabricPrices = {
        "katun": 50000,
        "sutra": 100000,
        "wolfis": 75000
    };

    // Update price calculation
    function calculatePrice() {
        const orderType = orderTypeSelect.value;
        const storeClothType = storeClothTypeSelect.value;
        const storeClothLength = parseFloat(storeClothLengthInput.value) || 0;
        const sequinPrice = parseFloat(sequinPriceInput.value) || 0;

        const basePrice = prices[orderType] || 0;
        const fabricPricePerMeter = fabricPrices[storeClothType] || 0;

        // Calculate total price using the updated formula
        const totalPrice = (basePrice + (fabricPricePerMeter * storeClothLength) + sequinPrice);

        // Display price with currency format
        priceInput.value = totalPrice.toLocaleString('id-ID', {
            style: 'currency',
            currency: 'IDR'
        });

        // Send price value to hidden input for storage
        hiddenPriceInput.value = (totalPrice).toFixed(2); // Ensure two decimal places
    }

    // Add event listeners for changes
    orderTypeSelect.addEventListener('change', calculatePrice);
    storeClothTypeSelect.addEventListener('change', calculatePrice);
    storeClothLengthInput.addEventListener('input', calculatePrice);
    sequinPriceInput.addEventListener('input', calculatePrice);
});

    </script>
@endsection
