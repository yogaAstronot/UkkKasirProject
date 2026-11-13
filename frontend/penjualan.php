<?php
include __DIR__ . '/../backend/penjualan_controller.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi Penjualan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 font-sans p-6 md:p-10">

    <div class="max-w-5xl mx-auto bg-white shadow-md rounded-lg overflow-hidden">
        <div class="px-6 py-5 border-b border-gray-200 bg-gray-50 flex flex-col sm:flex-row justify-between items-center gap-4">
            <div>
                <h2 class="text-2xl font-bold text-gray-700">Transaksi Penjualan</h2>
                <p class="text-sm text-gray-500 mt-1">Buat transaksi baru dan kelola keranjang belanja</p>
            </div>
            <a href="../petugas/petugas_dashboard.php" 
               class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 transition-colors shadow-sm">
                &larr; Kembali ke Menu
            </a>
        </div>

        <div class="p-6 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Buat Transaksi Baru</h3>
            <form method="POST" class="grid grid-cols-1 md:grid-cols-3 gap-4 items-end">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal</label>
                    <input type="date" name="TanggalPenjualan" required 
                           class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-shadow">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Pelanggan</label>
                    <select name="PelangganID" required 
                            class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-shadow bg-white">
                        <option value="" disabled selected>-- Pilih Pelanggan --</option>
                        <?php 
                        $pelanggan = $conn->query("SELECT * FROM pelanggan");
                        while($p = $pelanggan->fetch_assoc()) {
                            echo "<option value='".$p['PelangganID']."'>".$p['NamaPelanggan']."</option>";
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <button type="submit" name="buat_transaksi" 
                            class="w-full bg-emerald-600 text-white px-4 py-2 text-sm font-medium rounded-md hover:bg-emerald-700 transition-colors shadow-sm cursor-pointer">
                        + Buat Transaksi
                    </button>
                </div>
            </form>
        </div>

        <div class="overflow-x-auto p-6">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-100 border-b-2 border-gray-200">
                        <th class="px-4 py-3 text-sm font-semibold text-gray-600 uppercase tracking-wider">ID Transaksi</th>
                        <th class="px-4 py-3 text-sm font-semibold text-gray-600 uppercase tracking-wider">Tanggal</th>
                        <th class="px-4 py-3 text-sm font-semibold text-gray-600 uppercase tracking-wider">Total Harga</th>
                        <th class="px-4 py-3 text-sm font-semibold text-gray-600 uppercase tracking-wider text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <?php
                    $data = $conn->query("SELECT * FROM penjualan ORDER BY PenjualanID DESC");
                    while ($row = $data->fetch_assoc()):
                    ?>
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-4 py-3 text-sm text-gray-700 whitespace-nowrap font-medium">#<?= $row['PenjualanID'] ?></td>
                            <td class="px-4 py-3 text-sm text-gray-700 whitespace-nowrap"><?= date('d F Y', strtotime($row['TanggalPenjualan'])) ?></td>
                            
                            <td class="px-4 py-3 text-sm text-gray-700 whitespace-nowrap">
                                Rp <?= number_format($row['TotalHarga'], 3, ',', '.') ?>
                            </td>
                            
                            <td class="px-4 py-3 text-sm text-center whitespace-nowrap">
                                <a href="/UkkKasirProject/frontend/detail.php?id=<?= $row['PenjualanID'] ?>" 
                                   class="inline-flex items-center px-3 py-1.5 bg-indigo-50 text-indigo-600 border border-indigo-200 rounded hover:bg-indigo-100 hover:text-indigo-700 transition-colors font-medium text-xs">
                                     Isi Keranjang
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            
            <?php if ($data->num_rows == 0): ?>
                <div class="text-center py-8 text-gray-500 text-sm">
                    Belum ada transaksi penjualan.
                </div>
            <?php endif; ?>
        </div>

    </div>

</body>
</html>