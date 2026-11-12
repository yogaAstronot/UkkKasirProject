<?php
include __DIR__ . '/../backend/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengguna Sistem</title>
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
                <a href="produk.php" class="flex items-center px-4 py-2.5 rounded-lg text-gray-600 hover:bg-gray-100 hover:text-gray-900 text-sm transition">
                     Data Produk
                </a>
                <a href="stok_produk.php" class="flex items-center px-4 py-2.5 rounded-lg text-gray-600 hover:bg-gray-100 hover:text-gray-900 text-sm transition">
                     Stok Produk
                </a>
                <a href="daftar_petugas.php" class="flex items-center px-4 py-2.5 rounded-lg bg-blue-50 text-blue-600 font-semibold text-sm">
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
                <h1 class="text-lg font-bold text-gray-800">Daftar Petugas / Pengguna</h1>
            </header>

            <main class="p-8">
                <div class="bg-white rounded-xl border border-gray-200 shadow-xs overflow-hidden">
                    <div class="p-6 border-b border-gray-200 flex justify-between items-center">
                        <h3 class="text-lg font-bold text-gray-800">Data Pengguna Sistem</h3>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-gray-50 border-b border-gray-200 text-xs uppercase text-gray-500 font-semibold">
                                    <th class="py-3 px-6">ID</th>
                                    <th class="py-3 px-6">Nama Lengkap</th>
                                    <th class="py-3 px-6">Username</th>
                                    <th class="py-3 px-6">Password</th>
                                    <th class="py-3 px-6">Role</th>
                                    <th class="py-3 px-6 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 text-sm text-gray-700">
                                <?php
                                $data = $conn->query("SELECT * FROM users");
                                while ($row = $data->fetch_assoc()):
                                ?>
                                    <tr class="hover:bg-gray-50 transition">
                                        <td class="py-4 px-6 font-medium text-gray-900"><?= $row['id_user'] ?></td>
                                        <td class="py-4 px-6"><?= $row['nama_user'] ?></td>
                                        <td class="py-4 px-6"><?= $row['username'] ?></td>
                                        <td class="py-4 px-6"><?= $row['password'] ?></td>
                                        <td class="py-4 px-6">
                                            <span class="px-2.5 py-1 rounded-full text-xs font-semibold 
                                                <?= ($row['level'] == 'Administrator') ? 'bg-purple-100 text-purple-700' : 'bg-blue-100 text-blue-700' ?>">
                                                <?= $row['level'] ?>
                                            </span>
                                        </td>
                                        <td class="py-4 px-6 text-center space-x-2">
                                            <a href="edit_petugas.php?id_user=<?= $row['id_user'] ?>" class="text-blue-600 hover:text-blue-800 font-semibold">Edit</a>
                                            <span class="text-gray-300">|</span>
                                            <a href="../backend/hapus_user.php?id_user=<?= $row['id_user'] ?>" onclick="return confirm('Yakin ingin menghapus data ini?')" class="text-red-600 hover:text-red-800 font-semibold">Hapus</a>
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