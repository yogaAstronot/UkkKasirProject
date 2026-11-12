<?php
include __DIR__ . '/../backend/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Petugas - EasyCasier</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 font-sans">

    <div class="flex h-screen overflow-hidden">
        <div class="flex-1 flex flex-col overflow-y-auto">
            
            <header class="bg-white border-b border-gray-200 px-8 py-4 flex justify-between items-center shadow-xs">
                <h1 class="text-lg font-bold text-gray-800">Registrasi Pengguna Baru</h1>
            </header>

            <main class="p-8">
                <div class="max-w-xl bg-white rounded-xl border border-gray-200 shadow-xs overflow-hidden justyfy-center mx-auto">
                    <div class="p-6 border-b border-gray-200">
                        <h3 class="text-lg font-bold text-gray-800">Form Tambah Akun Petugas / Admin</h3>
                        <p class="text-xs text-gray-500 mt-1">Isi data di bawah ini untuk mendaftarkan akun baru ke dalam sistem.</p>
                    </div>

                    <form method="POST" action="/UkkKasirProject/backend/registrasi_controller.php" class="p-6 space-y-4">
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                            <input type="text" name="nama_user" required class="w-full bg-gray-50 border border-gray-300 rounded-lg py-2 px-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                            <input type="text" name="username" required class="w-full bg-gray-50 border border-gray-300 rounded-lg py-2 px-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                            <input type="password" name="password" required class="w-full bg-gray-50 border border-gray-300 rounded-lg py-2 px-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Level Akses</label>
                            <select name="level" required class="w-full bg-gray-50 border border-gray-300 rounded-lg py-2 px-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="petugas">Petugas (Kasir)</option>
                                <option value="administrator">Administrator</option>
                            </select>
                        </div>

                        <div class="pt-4 flex items-center space-x-3">
                            <button type="submit" name="register" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 px-4 rounded-lg text-sm transition">
                                Daftar Pengguna Baru
                            </button>
                            <a href="daftar_petugas.php" class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold py-2.5 px-4 rounded-lg text-sm transition text-center">
                                Batal
                            </a>
                        </div>

                    </form>
                </div>
            </main>

        </div>

    </div>

</body>

</html>