        // Tombol untuk memunculkan form barang
        document.getElementById('loadBarang').addEventListener('click', function () {
            // Ambil elemen form barang
            const contentDiv = document.getElementById('contentBarang');
            
            // Toggle visibility (tampilkan/sembunyikan)
            if (contentDiv.style.display === 'none' || contentDiv.style.display === '') {
                contentDiv.style.display = 'block';
            } else {
                contentDiv.style.display = 'none';
            }
        });