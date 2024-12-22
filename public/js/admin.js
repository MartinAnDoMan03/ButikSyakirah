document.addEventListener('DOMContentLoaded', function() {
    // Toggle Form dan Tabel Barang
    const showFormButton = document.getElementById('showFormButton');
    const addStockForm = document.getElementById('addStockForm');

    showFormButton.addEventListener('click', function() {
        // Tampilkan form dan sembunyikan tabel
        addStockForm.style.display = 'block';
    });
});

    // js untuk stock forms
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