<?php
include __DIR__ . '/../backend/produk_controller.php';
include_once __DIR__ . '/../backend/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Produk - KasirApp</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 font-sans">

    <div class="flex h-screen overflow-hidden">
        
        <aside class="w-64 bg-white border-r border-gray-200 flex flex-col">
            <div class="p-6 border-b border-gray-200">
                <h2 class="text-xl font-bold text-blue-600">EasyCasier</h2>
            </div>

            <nav class="flex-1 p-4 space-y-1 overflow-y-auto">
                <a href="admin_dashboard.php" class="flex items-center px-4 py-2.5 rounded-lg text-gray-600 hover:bg-gray-100 hover:text-gray-900 text-sm transition">
                     Dashboard
                </a>
                <a href="produk.php" class="flex items-center px-4 py-2.5 rounded-lg bg-blue-50 text-blue-600 font-semibold text-sm">
                     Data Produk
                </a>
                <a href="stok_produk.php" class="flex items-center px-4 py-2.5 rounded-lg text-gray-600 hover:bg-gray-100 hover:text-gray-900 text-sm transition">
                     Stok Produk
                </a>
                <a href="daftar_petugas.php" class="flex items-center px-4 py-2.5 rounded-lg text-gray-600 hover:bg-gray-100 hover:text-gray-900 text-sm transition">
                     Daftar Petugas
                </a>
                <a href="registrasi.php" class="flex items-center px-4 py-2.5 rounded-lg text-gray-600 hover:bg-gray-100 hover:text-gray-900 text-sm transition">
                     Registrasi Petugas
                </a>
            </nav>

            <div class="p-4 border-t border-gray-200">
                <a href="../backend/logout.php" class="flex items-center justify-center w-full bg-red-50 hover:bg-red-100 text-red-600 font-semibold py-2 px-4 rounded-lg text-sm transition">
                     Logout
                </a>
            </div>
        </aside>

        <div class="flex-1 flex flex-col overflow-y-auto">
            
            <header class="bg-white border-b border-gray-200 px-8 py-4 flex justify-between items-center shadow-xs">
                <h1 class="text-lg font-bold text-gray-800">Manajemen Data Produk</h1>
            </header>

            <main class="p-8 space-y-6">
                <div class="bg-white rounded-xl border border-gray-200 shadow-xs overflow-hidden">
                    <div class="p-6 border-b border-gray-200">
                        <h3 class="text-lg font-bold text-gray-800">Daftar Produk yang Tersedia</h3>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-gray-50 border-b border-gray-200 text-xs uppercase text-gray-500 font-semibold">
                                    <th class="py-3 px-6">ID</th>
                                    <th class="py-3 px-6">Nama Produk</th>
                                    <th class="py-3 px-6">Harga</th>
                                    <th class="py-3 px-6">Stok</th>
                                    <th class="py-3 px-6 text-center">Choice</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 text-sm text-gray-700">
                                <?php
                                $result = $conn->query("SELECT * FROM produk");
                                while ($row = $result->fetch_assoc()):
                                ?>
                                    <tr class="hover:bg-gray-50 transition">
                                        <td class="py-4 px-6 font-medium text-gray-900"><?= $row['ProdukID'] ?></td>
                                        <td class="py-4 px-6"><?= $row['NamaProduk'] ?></td>
                                        <td class="py-4 px-6">Rp <?= number_format($row['Harga'], 3, ',', '.') ?></td>
                                        <td class="py-4 px-6">
                                            <span class="px-2.5 py-1 rounded-full text-xs font-semibold 
                                                <?= ($row['Stok'] > 5) ?>">
                                                <?= $row['Stok'] ?> pcs
                                            </span>
                                        </td>
                                        <td class="py-4 px-6 text-center space-x-2">
                                            <a href="edit_produk.php?ProdukID=<?= $row['ProdukID'] ?>" class="text-blue-600 hover:text-blue-800 font-semibold">Edit</a>
                                            <span class="text-gray-300">|</span>
                                            <a href="../backend/hapus_produk.php?ProdukID=<?= $row['ProdukID'] ?>" onclick="return confirm('Yakin ingin menghapus produk ini?')" class="text-red-600 hover:text-red-800 font-semibold">Hapus</a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </main>

        </div>

    </div>

</body>

</html>