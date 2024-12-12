document.addEventListener('DOMContentLoaded', function() {
    const stockTypeDropdown = document.getElementById('stockType');
    const quantityLabel = document.getElementById('quantityLabel');
    const stockQuantityInput = document.getElementById('stockQuantity');

    // Menyesuaikan label dan unit jumlah stok berdasarkan pilihan jenis barang saat halaman dimuat
    if (stockTypeDropdown.value === 'benang') {
        quantityLabel.textContent = 'Jumlah Stok (Pool):';
    } else {
        quantityLabel.textContent = 'Jumlah Stok (Meter):';
    }

    // Menangani perubahan pilihan jenis barang
    stockTypeDropdown.addEventListener('change', function() {
        const stockType = this.value;

        if (stockType === 'kain') {
            quantityLabel.textContent = 'Jumlah Stok (Meter):';
            stockQuantityInput.setAttribute('step', 'any');  // Allow decimal for kain
        } else if (stockType === 'benang') {
            quantityLabel.textContent = 'Jumlah Stok (Pool):';
            stockQuantityInput.setAttribute('step', '1');  // Only whole numbers for benang
        }
    });

    // Toggle Form dan Tabel Barang
    const showFormButton = document.getElementById('showFormButton');
    const addStockForm = document.getElementById('addStockForm');

    showFormButton.addEventListener('click', function() {
        // Tampilkan form dan sembunyikan tabel
        addStockForm.style.display = 'block';
    });
});