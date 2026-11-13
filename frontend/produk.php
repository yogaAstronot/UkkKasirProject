<?php
include __DIR__ . '/../backend/produk_controller.php';
include_once __DIR__ . '/../backend/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Produk</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800 font-sans p-6 md:p-10">

    <div class="max-w-5xl mx-auto bg-white shadow-md rounded-lg overflow-hidden">
        
        <div class="px-6 py-5 border-b border-gray-200 bg-gray-50 flex flex-col sm:flex-row justify-between items-center gap-4">
            <div>
                <h2 class="text-2xl font-bold text-gray-700">Data Produk</h2>
                <p class="text-sm text-gray-500 mt-1">Daftar produk yang tersedia di sistem</p>
            </div>
            <a href="/UkkKasirProject/petugas/petugas_dashboard.php" 
               class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 transition-colors shadow-sm">
                &larr; Kembali ke Menu
            </a>
        </div>

        <div class="overflow-x-auto p-6">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-100 border-b-2 border-gray-200">
                        <th class="px-4 py-3 text-sm font-semibold text-gray-600 uppercase tracking-wider">ID</th>
                        <th class="px-4 py-3 text-sm font-semibold text-gray-600 uppercase tracking-wider">Nama Produk</th>
                        <th class="px-4 py-3 text-sm font-semibold text-gray-600 uppercase tracking-wider">Harga</th>
                        <th class="px-4 py-3 text-sm font-semibold text-gray-600 uppercase tracking-wider">Stok</th>
                        <th class="px-4 py-3 text-sm font-semibold text-gray-600 uppercase tracking-wider text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <?php
                    $result = $conn->query("SELECT * FROM produk");
                    while ($row = $result->fetch_assoc()):
                    ?>
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-4 py-3 text-sm text-gray-700 whitespace-nowrap"><?= $row['ProdukID'] ?></td>
                            <td class="px-4 py-3 text-sm text-gray-700 font-medium"><?= $row['NamaProduk'] ?></td>
                            <td class="px-4 py-3 text-sm text-gray-700 whitespace-nowrap">Rp <?= number_format($row['Harga'], 3, ',', '.') ?></td>
                            <td class="px-4 py-3 text-sm text-gray-700"><?= $row['Stok'] ?></td>
                            <td class="px-4 py-3 text-sm text-center whitespace-nowrap">
                                <a href="edit_produk.php?ProdukID=<?= $row['ProdukID'] ?>" 
                                   class="text-blue-500 hover:text-blue-700 font-medium mr-3 transition-colors">
                                    Edit
                                </a> 
                                <span class="text-gray-300">|</span>
                                <a href="../backend/hapus_produk.php?ProdukID=<?= $row['ProdukID'] ?>" 
                                   onclick="return confirm('Yakin ingin menghapus produk ini?')"
                                   class="text-red-500 hover:text-red-700 font-medium ml-3 transition-colors">
                                    Hapus
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            
            <?php if ($result->num_rows == 0): ?>
                <div class="text-center py-8 text-gray-500 text-sm">
                    Belum ada data produk.
                </div>
            <?php endif; ?>
        </div>
    </div>

</body>
</html>