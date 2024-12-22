document.addEventListener("DOMContentLoaded", function() {
        // Toggle Form dan Tabel Barang
        const showFormButton = document.getElementById('showFormButton');
        const addStockForm = document.getElementById('addStockForm');
    
        showFormButton.addEventListener('click', function() {
            // Tampilkan form dan sembunyikan tabel
            addStockForm.style.display = 'block';
        });
});

 // Fungsi untuk membuka modal
 function openDetailModal() {
    document.getElementById('detailModal').style.display = 'block';
}

// fungsi untuk menutup modal
function closeDetailModal() {
    document.getElementById('detailModal').style.display = 'none';
}

// Fungsi untuk memperbarui harga baju sesuai pilihan
function updatePrice() {
    var order_type = document.getElementById('order_type').value;
    var priceInput = document.getElementById('priceInput');

    // Harga berdasarkan jenis baju yang dipilih
    var prices = {
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

    // Set harga pada input harga
    if (order_type && prices[order_type]) {
        priceInput.value = prices[order_type].toLocaleString('id-ID', { style: 'currency', currency: 'IDR' });
    } else {
        priceInput.value = "";
    }
}

// Fungsi untuk memperbarui harga kain berdasarkan pilihan
function updateFabricPrice() {
    var fabricType = document.getElementById('store_cloth_type').value;
    var fabricPriceInput = document.getElementById('fabricPrice');

    // Harga kain per meter
    var fabricPrices = {
        "katun": 50000,
        "sutra": 100000,
        "wolfis": 75000
    };

    // Set harga kain
    if (fabricType && fabricPrices[fabricType]) {
        fabricPriceInput.value = fabricPrices[fabricType].toLocaleString('id-ID', { style: 'currency', currency: 'IDR' });
    } else {
        fabricPriceInput.value = "Harga Tidak Diketahui";
    }
}

// Fungsi untuk menghitung biaya kain
function calculateFabricCost() {
    var fabricPrice = parseFloat(document.getElementById('fabricPrice').value.replace(/[^0-9.-]+/g,""));
    var store_cloth_length = parseFloat(document.getElementById('store_cloth_length').value);
    var totalFabricPrice = document.getElementById('totalFabricPrice');

    // Jika harga kain dan panjang kain valid, hitung total harga kain
    if (!isNaN(fabricPrice) && !isNaN(store_cloth_length)) {
        totalFabricPrice.value = (fabricPrice * store_cloth_length).toLocaleString('id-ID', { style: 'currency', currency: 'IDR' });
    } else {
        totalFabricPrice.value = "Harga Tidak Valid";
    }

    calculateprice();
}

// fungsi untuk menghitung total harga berdasarkan kain dan payet
function calculateprice() {
    var fabricCost = parseFloat(document.getElementById('totalFabricPrice').value.replace(/[^0-9.-]+/g,""));
    var payetPrice = parseFloat(document.getElementById('payetPrice').value.replace(/[^0-9.-]+/g,""));
    var sequin = document.getElementById('sequin').value;
    var price = document.getElementById('price');

    var total = fabricCost;

    if (sequin === "yes" && !isNaN(payetPrice)) {
        total += payetPrice;
    }

    price.value = total.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' });
}
// fungsi untuk menampilkan form detail pesanan
function showDetailForm() {
    openDetailModal(); 
}



// Fungsi untuk membuka modal
function openDetailUkuranModal() {
    document.getElementById("detailUkuranModal").style.display = "block";
}

// Fungsi untuk menutup modal
function closeDetailUkuranModal() {
    document.getElementById("detailUkuranModal").style.display = "none";
}

// Menambahkan event listener pada tombol dengan kelas btn-detail-ukuran
document.querySelectorAll('.btn-detail-ukuran').forEach(function(button) {
    button.addEventListener('click', function(event) {
        event.preventDefault(); // Mencegah tombol redirect
        openDetailUkuranModal(); // Membuka modal
    });
});

// Menambahkan event listener untuk menutup modal ketika klik di luar modal
window.onclick = function(event) {
    if (event.target == document.getElementById("detailUkuranModal")) {
        closeDetailUkuranModal(); // Menutup modal jika klik di luar modal
    }
}



// js untuk customers forms
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

// script select customer lama
$(document).ready(function() {
    // Mengaktifkan Select2 pada dropdown #oldCustomer
    $('#oldCustomer').select2({
        placeholder: 'Cari Customer',
        width: '100%',
        theme: 'default',
        height: '50px',
        allowClear: true  // Menambahkan tombol clear (kosongkan pilihan)
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