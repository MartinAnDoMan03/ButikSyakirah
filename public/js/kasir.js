document.addEventListener("DOMContentLoaded", function() {
    // Logout Button Event Listener
    document.getElementById("logoutButton").addEventListener("click", function(event) {
        event.preventDefault(); 

        // Menampilkan modal konfirmasi logout
        const modal = document.getElementById("logoutModal");
        modal.style.display = "flex";

        // Menutup modal jika tombol close diklik
        document.querySelector(".close").addEventListener("click", function() {
            modal.style.display = "none"; // Menutup modal
        });

        // Menangani klik tombol "Ya, Logout"
        document.getElementById("confirmLogout").addEventListener("click", function() {
            window.location.href = "login.php"; // Arahkan ke halaman logout
        });

        // Menangani klik tombol "Batal"
        document.getElementById("cancelLogout").addEventListener("click", function() {
            modal.style.display = "none"; // Menutup modal tanpa logout
        });
    });

    // Menutup modal jika pengguna klik di luar modal
    window.addEventListener("click", function(event) {
        const modal = document.getElementById("logoutModal");
        if (event.target === modal) {
            modal.style.display = "none"; // Menutup modal jika klik di luar modal
        }
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
    var clothingType = document.getElementById('clothingType').value;
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
    if (clothingType && prices[clothingType]) {
        priceInput.value = prices[clothingType].toLocaleString('id-ID', { style: 'currency', currency: 'IDR' });
    } else {
        priceInput.value = "Harga Tidak Diketahui";
    }
}

// Fungsi untuk memperbarui harga kain berdasarkan pilihan
function updateFabricPrice() {
    var fabricType = document.getElementById('storeFabric').value;
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
    var fabricLength = parseFloat(document.getElementById('fabricLength').value);
    var totalFabricPrice = document.getElementById('totalFabricPrice');

    // Jika harga kain dan panjang kain valid, hitung total harga kain
    if (!isNaN(fabricPrice) && !isNaN(fabricLength)) {
        totalFabricPrice.value = (fabricPrice * fabricLength).toLocaleString('id-ID', { style: 'currency', currency: 'IDR' });
    } else {
        totalFabricPrice.value = "Harga Tidak Valid";
    }

    calculateTotalPrice();
}

// fungsi untuk menghitung total harga berdasarkan kain dan payet
function calculateTotalPrice() {
    var fabricCost = parseFloat(document.getElementById('totalFabricPrice').value.replace(/[^0-9.-]+/g,""));
    var payetPrice = parseFloat(document.getElementById('payetPrice').value.replace(/[^0-9.-]+/g,""));
    var payetCode = document.getElementById('payetCode').value;
    var totalPrice = document.getElementById('totalPrice');

    var total = fabricCost;

    if (payetCode === "yes" && !isNaN(payetPrice)) {
        total += payetPrice;
    }

    totalPrice.value = total.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' });
}

// fungsi untuk menampilkan form detail pesanan
function showDetailForm() {
    openDetailModal(); 
}

