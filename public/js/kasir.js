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

// pilih customer
document.addEventListener("DOMContentLoaded", function() {
    const customerTypeSelect = document.getElementById("customerType");
    const newCustomerForm = document.getElementById("newCustomerForm");
    const oldCustomerForm = document.getElementById("oldCustomerForm");
    const oldCustomerSelect = document.getElementById("oldCustomer");

    // Fungsi untuk menampilkan form sesuai pilihan customer (baru/lamanya)
    function toggleCustomerForm() {
      const customerType = customerTypeSelect.value;
  
      if (customerType === "new") {
        newCustomerForm.style.display = "block";
        oldCustomerForm.style.display = "none";
      } else if (customerType === "old") {
        newCustomerForm.style.display = "none";
        oldCustomerForm.style.display = "block";
        loadOldCustomers(); 
      }
    }
  
    function loadOldCustomers() {
      oldCustomerSelect.innerHTML = '';  
    
      fetch('datacustomer.php') //mengembalikan nilai data customer
        .then(response => response.json()) 
        .then(data => console.log(data))
        .then(customers => {
          if (customers.length > 0) {
            customers.forEach(customer => {
              const option = document.createElement("option");
              option.value = customer.id;
              option.textContent = customer.nama;
              oldCustomerSelect.appendChild(option);
            });
          } else {
            const option = document.createElement("option");
            option.textContent = "Tidak ada customer lama";
            oldCustomerSelect.appendChild(option);
          }
        })
        .catch(error => {
          console.error("Error fetching customer data:", error);
        });
    }
  
    // Event listener untuk menangani perubahan pada dropdown customerType
    customerTypeSelect.addEventListener("change", toggleCustomerForm);
  
    // Memanggil fungsi untuk menampilkan form sesuai dengan pilihan yang sudah dipilih
    toggleCustomerForm();
} );


document.addEventListener("DOMContentLoaded", function () {
    const clothingTypeSelect = document.getElementById("clothingType");
    const priceInput = document.getElementById("price");
    const storeFabricSelect = document.getElementById("storeFabric");
    const storeFabricPriceInput = document.getElementById("storeFabricPrice");
    const payetPriceInput = document.getElementById("payetPrice");
    const totalPriceInput = document.getElementById("totalPrice");
    const fabricPriceInput = document.getElementById("fabricPrice");
    const fabricLengthInput = document.getElementById("fabricLength");
    const totalFabricPriceInput = document.getElementById("totalFabricPrice");

    // Daftar harga pakaian
    const clothingPrices = {
        shirt_men_long: 100000,
        shirt_women_long: 120000,
        shirt_kids_long: 110000,
        shirt_men_short: 90000,
        shirt_women_short: 95000,
        shirt_kids_short: 85000,
        shirt_men_no_collar_long: 105000,
        shirt_women_no_collar_long: 125000,
        shirt_kids_no_collar_long: 115000,
        shirt_men_no_collar_short: 90000,
        shirt_women_no_collar_short: 95000,
        shirt_kids_no_collar_short: 85000,
        gamis: 160000,
        kebaya: 140000,
        skirt_long: 120000,
        skirt_short: 110000,
        pants_men: 130000,
        pants_women: 125000,
        pants_men_short: 100000,
        pants_women_short: 95000
    };

    // Daftar harga kain
    const fabricPrices = {
        katun: 50000,
        sutra: 100000,
        wolfis: 75000
    };

    // Fungsi untuk menghitung total harga
    function calculateTotalPrice() {
        const clothingPrice = parseInt(priceInput.value.replace(/[^\d]/g, "")) || 0;
        const fabricPricePerMeter = parseInt(storeFabricPriceInput.value.replace(/[^\d]/g, "")) || 0;
        const fabricLength = parseFloat(fabricLengthInput.value) || 0;
        const payetPrice = parseInt(payetPriceInput.value.replace(/[^\d]/g, "")) || 0;

        const totalFabricPrice = fabricPricePerMeter * fabricLength;
        const totalPrice = clothingPrice + totalFabricPrice + payetPrice;
        
        totalPriceInput.value = `Rp ${totalPrice.toLocaleString()}`;
    }

    // Event listener untuk memilih jenis pakaian
    clothingTypeSelect.addEventListener("change", function () {
        const selectedClothing = clothingTypeSelect.value;
        if (clothingPrices[selectedClothing]) {
            priceInput.value = `Rp ${clothingPrices[selectedClothing].toLocaleString()}`;
        } else {
            priceInput.value = "";
        }
        calculateTotalPrice();
    });

    // Event listener untuk memilih kain
    function calculateTotalFabricPrice() {
        const selectedFabric = storeFabricSelect.value;
        const fabricLength = parseFloat(fabricLengthInput.value) || 0;
        const fabricPrice = fabricPrices[selectedFabric] || 0;

        const totalFabricPrice = fabricLength * fabricPrice;

        if (totalFabricPrice > 0) {
            totalFabricPriceInput.value = `Rp ${totalFabricPrice.toLocaleString()}`;
        } else {
            totalFabricPriceInput.value = "";
        }
        calculateTotalPrice();
    }

    // Event listener untuk memilih kain
    storeFabricSelect.addEventListener("change", function () {
        const selectedFabric = storeFabricSelect.value;
        if (fabricPrices[selectedFabric]) {
            fabricPriceInput.value = `Rp ${fabricPrices[selectedFabric].toLocaleString()}`;
        } else {
            fabricPriceInput.value = "";
        }
        calculateTotalFabricPrice(); // Hitung total harga kain setelah kain dipilih
    });

    // Event listener untuk menginput ukuran kain
    fabricLengthInput.addEventListener("input", calculateTotalFabricPrice);


    payetPriceInput.addEventListener("input", function () {
        // Ambil nilai input dan hapus karakter yang bukan angka
        let value = payetPriceInput.value.replace(/[^\d]/g, "");

        // Tambahkan pemisah ribuan
        value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ".");

        // Perbarui nilai input
        payetPriceInput.value = value ? "Rp " + value : "";
        calculateTotalPrice();
    });
    calculateTotalPrice();

});
