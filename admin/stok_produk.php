<?php
include __DIR__ . '/../backend/produk_controller.php';
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
                <div class="mt-4 box-border border-gray-200 rounded-lg p-4 bg-blue-50">
                <h1>
                    <h1 class="text-gray-800">Selamat Datang,<br> 
                    <?php echo $_SESSION['nama_user']; ?></h1>
                </h1>
            </div>
            </div>

            <nav class="flex-1 p-4 space-y-1 overflow-y-auto">
                <a href="admin_dashboard.php" class="flex items-center px-4 py-2.5 rounded-lg text-gray-600 hover:bg-gray-100 hover:text-gray-900 text-sm transition">
                     Dashboard
                </a>
                <a href="produk.php" class="flex items-center px-4 py-2.5 rounded-lg text-gray-600 hover:bg-gray-100 hover:text-gray-900 text-sm transition">
                     Data Produk
                </a>
                <a href="stok_produk.php" class="flex items-center px-4 py-2.5 rounded-lg bg-blue-50 text-blue-600 font-semibold text-sm">
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
                <h1 class="text-lg font-bold text-gray-800">Data Produk</h1>
            </header>

            <main class="p-8">
                <div class="bg-white rounded-xl border border-gray-200 shadow-xs overflow-hidden">
                    <div class="p-6 border-b border-gray-200 flex justify-between items-center">
                        <h3 class="text-lg font-bold text-gray-800">Daftar Produk yang Tersedia</h3>
                    </div>

                    <div class="overflow-x-auto">
                       <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-xs">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">Tambah Produk Baru</h3>
                    <form method="POST" class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Produk</label>
                            <input type="text" name="NamaProduk" required class="w-full bg-gray-50 border border-gray-300 rounded-lg py-2 px-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Harga</label>
                            <input type="number" step="0.01" name="Harga" required class="w-full bg-gray-50 border border-gray-300 rounded-lg py-2 px-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Stok</label>
                            <input type="number" name="Stok" required class="w-full bg-gray-50 border border-gray-300 rounded-lg py-2 px-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div>
                            <button type="submit" name="simpan" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg text-sm transition">
                                Simpan Produk
                            </button>
                        </div>
                    </form>
                </div>

                    </div>
                </div>
            </main>

        </div>

    </div>

</body>

</html>