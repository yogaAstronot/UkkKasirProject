<?php
include __DIR__ . '/../backend/koneksi.php';

$sql_produk = $conn->query("SELECT COUNT(*) AS total_produk FROM produk");
$data_produk = $sql_produk->fetch_assoc();

$sql_stok = $conn->query("SELECT COUNT(*) AS stok_tipis FROM produk WHERE Stok <= 5");
$data_stok = $sql_stok->fetch_assoc();

$sql_transaksi = $conn->query("SELECT COUNT(*) AS total_transaksi, SUM(TotalHarga) AS pendapatan FROM penjualan");
$data_transaksi = $sql_transaksi->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - EasyCasier</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 font-sans">

    <div class="flex h-screen overflow-hidden">
        
        <aside class="w-64 bg-white border-r border-gray-200 flex flex-col">
            <div class="p-6 border-b border-gray-200">
                <h2 class="text-xl font-bold text-blue-600">EasyCasier</h2>
                 <div class="mt-4 box-border border-gray-200 rounded-lg p-4 bg-blue-50">
                <h1>
                    <h1 class="text-gray-800">Selamat Datang,<br> 
                    <?php echo $_SESSION['nama_user']; ?></h1>
                </h1>
            </div>
            </div>
           

            <nav class="flex-1 p-4 space-y-1 overflow-y-auto">
                <a href="admin_dashboard.php" class="flex items-center px-4 py-2.5 rounded-lg bg-blue-50 text-blue-600 font-semibold text-sm">
                     Dashboard
                </a>
                <a href="produk.php" class="flex items-center px-4 py-2.5 rounded-lg text-gray-600 hover:bg-gray-100 hover:text-gray-900 text-sm transition">
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
                <h1 class="text-lg font-bold text-gray-800">Dashboard Utama</h1>
            </header>

            <main class="p-8 space-y-6">
                
                <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-xs">
                    <h2 class="text-xl font-bold text-gray-800 mb-1">Selamat Datang di EasyCasier </h2>
                    <p class="text-gray-600 text-sm">Berikut adalah ringkasan penjualan dan aktivitas toko hari ini.</p>
                </div>

                <div class="bg-white rounded-xl border border-gray-200 shadow-xs overflow-hidden">
                    <div class="p-6 border-b border-gray-200 flex justify-between items-center">
                        <h3 class="text-lg font-bold text-gray-800"> Detail Penjualan Terbaru BOS!</h3>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-gray-50 border-b border-gray-200 text-xs uppercase text-gray-500 font-semibold">
                                    <th class="py-3 px-6">Nama Pelanggan</th>
                                    <th class="py-3 pxx-6">Produk yang di beli</th>
                                    <th class="py-3 px-6">Tanggal Penjualan</th>
                                    <th class="py-3 px-6">Total Harga</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 text-sm text-gray-700">
                                <?php
                                $sql_penjualan = $conn->query("SELECT penjualan.TanggalPenjualan, pelanggan.NamaPelanggan, penjualan.TotalHarga FROM penjualan JOIN pelanggan ON penjualan.PelangganID = pelanggan.PelangganID ORDER BY penjualan.PenjualanID DESC LIMIT 10");
                                if ($sql_penjualan && $sql_penjualan->num_rows > 0):
                                    while ($row = $sql_penjualan->fetch_assoc()):
                                ?>
                                    <tr class="hover:bg-gray-50 transition">
                                        <td class="py-4 px-6"><?= $row['NamaPelanggan'] ?></td>
                                        <td class="py-4 px-6"><</td>
                                        <td class="py-4 px-6"><?= $row['TanggalPenjualan'] ?></td>
                                        <td class="py-4 px-6 font-semibold text-green-600">Rp <?= number_format($row['TotalHarga'], 3, ',', '.') ?></td>
                                    </tr>
                                <?php 
                                    endwhile; 
                                else:
                                ?>
                                    <tr>
                                        <td colspan="3" class="py-4 px-6 text-center text-gray-500">Belum ada data transaksi penjualan yang tercatat. 📭</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </main>

        </div>

    </div>

</body>

</html>