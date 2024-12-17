document.addEventListener('DOMContentLoaded', function() {
    // Toggle Form dan Tabel Barang
    const showFormButton = document.getElementById('showFormButton');
    const addStockForm = document.getElementById('addStockForm');

    showFormButton.addEventListener('click', function() {
        // Tampilkan form dan sembunyikan tabel
        addStockForm.style.display = 'block';
    });
});