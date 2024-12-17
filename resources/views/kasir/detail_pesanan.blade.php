<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail pesanan</title>
</head>

<body>
    <div>
        <form action="" method="POST">
            @csrf
            <label for="clothingType">Jenis Baju:</label>
            <select id="clothingType" name="clothingType">
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

    <!-- Input harga manual untuk custom -->
    <div id="customPriceInput" style="display: none; margin-top: 20px;">
        <label for="manualPrice">Masukkan Harga Custom:</label>
        <input type="number" id="manualPrice" name="manualPrice" placeholder="Masukkan harga (Rp)">
    </div>

    <!-- Tombol cek harga -->
    <div style="margin-top: 20px;">
        <button id="checkPriceButton">Lihat Harga</button>
    </div>

    <div id="priceDisplay" style="margin-top: 20px; font-weight: bold;"></div>
    <!-- Pilih Kain Toko -->
    <div>
        <label for="storeFabric">Kain Toko:</label>
        <select id="storeFabric" name="storeFabric">
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
        <input type="number" id="fabricLength" min="0" step="0.1" />
    </div>
    <div>
        <label for="totalFabricPrice">Total Harga Kain:</label>
        <input type="text" id="totalFabricPrice" readonly />
    </div>
    <!-- Payet -->
    <div>
        <label for="payetCode">Payet:</label>
        <select id="payetCode" name="payetCode">
            <option value="no">Tidak</option>
            <option value="yes">Tambah payet</option>
        </select>
    </div>

    <!-- Harga Payet -->
    <div>
        <label for="payetPrice">Harga Payet:</label>
        <input type="text" id="payetPrice" name="payetPrice" placeholder="Masukkan Harga Payet">
    </div>

    <div>
        <label for="totalPrice">Total Harga:</label>
        <input type="text" id="totalPrice" name="totalPrice" readonly>
    </div>
    </form>

    <script>
        const clothingDropdown = document.getElementById('clothingType');
        const customPriceInput = document.getElementById('customPriceInput');
        const manualPrice = document.getElementById('manualPrice');
        const checkPriceButton = document.getElementById('checkPriceButton');
        const priceDisplay = document.getElementById('priceDisplay');

        // Menampilkan input manual jika "Custom" dipilih
        clothingDropdown.addEventListener('change', () => {
            if (clothingDropdown.value === 'custom') {
                customPriceInput.style.display = 'block';
            } else {
                customPriceInput.style.display = 'none';
                manualPrice.value = ''; // Reset input manual jika bukan custom
            }
        });

        // Menangani tombol cek harga
        checkPriceButton.addEventListener('click', () => {
            const selectedValue = clothingDropdown.value;
            let priceMessage = '';

            if (selectedValue === '') {
                priceMessage = "Silakan pilih jenis baju terlebih dahulu.";
            } else if (selectedValue === 'custom') {
                const customPrice = manualPrice.value;
                if (customPrice) {
                    priceMessage = `Harga Custom: Rp ${parseInt(customPrice).toLocaleString()}`;
                } else {
                    priceMessage = "Silakan masukkan harga untuk Custom.";
                }
            } else {
                // Untuk opsi yang tidak custom, ambil harga dari database atau atur manual (contoh data)
                const priceData = {
                    'kemeja-lengan-panjang-pria': 150000,
                    'kemeja-lengan-pendek-pria': 130000,
                    'gamis-wanita': 200000,
                    'rok-panjang-wanita': 120000,
                    'rok-pendek-wanita': 100000,
                    'kebaya': 250000,
                    'kemeja-lengan-panjang-anak': 100000,
                    'kemeja-lengan-pendek-anak': 80000,
                    'gamis-anak': 150000,
                    'jas': 500000
                };

                priceMessage = `Harga: Rp ${priceData[selectedValue].toLocaleString()}`;
            }

            priceDisplay.textContent = priceMessage;
        });
    </script>
</body>

</html>
