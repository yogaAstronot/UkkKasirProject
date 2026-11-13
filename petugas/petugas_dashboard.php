<?php
session_start();

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Petugas - Kasir</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 font-sans antialiased">

    <nav class="bg-slate-900 text-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center space-x-3">
                    <i class="fa-solid fa-cash-register text-teal-400 text-2xl"></i>
                    <span class="font-bold text-lg tracking-wide">UKK Kasir</span>
                </div>
                
                <div class="flex items-center space-x-4">
                    <span class="text-sm text-gray-300 hidden sm:inline">
                        <i class="fa-regular fa-user mr-1"></i> Halo, <strong class="text-white"><?php echo htmlspecialchars($_SESSION['nama_user']); ?></strong>
                    </span>
                    <a href="/UkkKasirProject/backend/logout.php" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1.5 rounded-lg text-sm font-medium transition duration-150">
                        <i class="fa-solid fa-right-from-bracket mr-1"></i> Logout
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        
        <div class="bg-white border border-gray-200 rounded-2xl p-6 mb-8 shadow-sm">
            <h1 class="text-2xl sm:text-3xl font-bold text-gray-800">Petugas Dashboard</h1>
            <p class="text-gray-500 mt-1">Selamat datang kembali! Kelola produk, pelanggan, dan transaksi di sini.</p>
        </div>

        <h2 class="text-lg font-semibold text-gray-700 mb-4">Menu Utama</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            
            <a href="/UkkKasirProject/frontend/produk.php" class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm hover:shadow-md hover:border-teal-500 transition duration-200 group">
                <div class="w-12 h-12 bg-teal-50 text-teal-600 rounded-lg flex items-center justify-center mb-4 group-hover:bg-teal-600 group-hover:text-white transition duration-200">
                    <i class="fa-solid fa-box-open text-xl"></i>
                </div>
                <h3 class="font-semibold text-gray-800 text-lg">Data Produk</h3>
                <p class="text-sm text-gray-500 mt-1">Kelola stok dan daftar barang.</p>
            </a>

            <a href="/UkkKasirProject/frontend/pelanggan.php" class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm hover:shadow-md hover:border-teal-500 transition duration-200 group">
                <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-lg flex items-center justify-center mb-4 group-hover:bg-blue-600 group-hover:text-white transition duration-200">
                    <i class="fa-solid fa-users text-xl"></i>
                </div>
                <h3 class="font-semibold text-gray-800 text-lg">Data Pelanggan</h3>
                <p class="text-sm text-gray-500 mt-1">Kelola data member/pelanggan.</p>
            </a>

            <a href="/UkkKasirProject/frontend/penjualan.php" class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm hover:shadow-md hover:border-teal-500 transition duration-200 group">
                <div class="w-12 h-12 bg-amber-50 text-amber-600 rounded-lg flex items-center justify-center mb-4 group-hover:bg-amber-600 group-hover:text-white transition duration-200">
                    <i class="fa-solid fa-cart-shopping text-xl"></i>
                </div>
                <h3 class="font-semibold text-gray-800 text-lg">Transaksi Penjualan</h3>
                <p class="text-sm text-gray-500 mt-1">Buat transaksi kasir baru.</p>
            </a>
        </div>
    </main>

</body>
</html>