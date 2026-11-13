<?php
include __DIR__ . '/../backend/detail_controller.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Transaksi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 font-sans p-6 md:p-10">

    <div class="max-w-5xl mx-auto space-y-6">
        <div class="bg-white shadow-md rounded-lg overflow-hidden flex flex-col md:flex-row justify-between items-center p-6 border-l-4 border-[#023047]">
            <div>
                <div class="flex items-center gap-3 mb-2">
                    <a href="penjualan.php" class="text-gray-500 hover:text-blue-600 transition-colors" title="Kembali">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                    </a>
                    <h2 class="text-2xl font-bold text-gray-700">Detail Transaksi <span class="text-blue-600">#<?= htmlspecialchars($id_penjualan) ?></span></h2>
                </div>
                <p class="text-sm text-gray-500 ml-9">Tambahkan barang ke dalam keranjang transaksi ini</p>
            </div>

        </div>

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            
            <div class="p-6 border-b border-gray-200 bg-gray-50">
                <form method="POST" class="grid grid-cols-1 md:grid-cols-5 gap-4 items-end">
                    <div class="md:col-span-3">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Pilih Barang</label>
                        <select name="ProdukID" required 
                                class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-shadow bg-white">
                            <option value="" disabled selected>-- Pilih Produk --</option>
                            <?php 
                            $produk = $conn->query("SELECT * FROM produk WHERE Stok > 0");
                            while($p = $produk->fetch_assoc()) {
                                $harga_format = number_format($p['Harga'], 3, ',', '.');
                                echo "<option value='".$p['ProdukID']."'>".$p['NamaProduk']." (Rp ".$harga_format.")</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="md:col-span-1">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Jumlah</label>
                        <input type="number" name="JumlahProduk" min="1" required 
                               class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-shadow" placeholder="1">
                    </div>
                    <div class="md:col-span-1">
                        <button type="submit" name="tambah_barang" 
                                class="w-full bg-emerald-600 text-white px-4 py-2 text-sm font-medium rounded-md hover:bg-emerald-700 transition-colors shadow-sm cursor-pointer flex items-center justify-center gap-2">
                            <span>+ Tambah</span>
                        </button>
                    </div>
                </form>
            </div>

            <div class="overflow-x-auto p-6">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-100 border-b-2 border-gray-200">
                            <th class="px-4 py-3 text-sm font-semibold text-gray-600 uppercase tracking-wider">Nama Barang</th>
                            <th class="px-4 py-3 text-sm font-semibold text-gray-600 uppercase tracking-wider text-center">Jumlah</th>
                            <th class="px-4 py-3 text-sm font-semibold text-gray-600 uppercase tracking-wider text-right">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <?php 
                        $detail = $conn->query("SELECT detailpenjualan.*, produk.NamaProduk FROM detailpenjualan JOIN produk ON detailpenjualan.ProdukID = produk.ProdukID WHERE PenjualanID='$id_penjualan'");
                        
                        if ($detail->num_rows > 0):
                            while($row = $detail->fetch_assoc()): 
                        ?>
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-4 py-3 text-sm text-gray-700 font-medium"><?= $row['NamaProduk'] ?></td>
                                <td class="px-4 py-3 text-sm text-gray-700 text-center"><?= $row['JumlahProduk'] ?></td>
                                <td class="px-4 py-3 text-sm text-gray-700 text-right font-medium text-[#023047]">
                                    Rp <?= number_format($row['Subtotal'], 4, ',', '.') ?>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="3" class="text-center py-8 text-gray-500 text-sm">
                                    Keranjang masih kosong. Silakan tambah barang.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</body>
</html>