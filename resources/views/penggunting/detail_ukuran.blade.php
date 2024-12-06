                    <!-- Pilih Kain Toko -->
                    <br></br>
                    <h3>Detail Pesanan</h3>
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
                        <label for="payetCode">Kode Payet:</label>
                        <select id="payetCode" name="payetCode">
                            <option value="" disabled selected>Pilih Kode Payet</option>
                            <option value="P001">P001</option>
                            <option value="P002">P002</option>
                            <option value="P003">P003</option>
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