<?php
include __DIR__ . '/../backend/koneksi.php';

if (empty($_GET['id_user'])) {
    echo "<script>alert('ID User tidak ditemukan!'); window.location.href='daftar_petugas.php';</script>";
    exit();
}

$id_user = $_GET['id_user'];
$query = $conn->query("SELECT * FROM users WHERE id_user = '$id_user'");
$data = $query->fetch_assoc();

if (!$data) {
    echo "<script>alert('Data user tidak ditemukan!'); window.location.href='daftar_petugas.php';</script>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengguna</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans">

    <div class="flex h-screen overflow-hidden">
        <div class="flex-1 flex flex-col overflow-y-auto">
            
            <header class="bg-white border-b border-gray-200 px-8 py-4">
                <h1 class="text-lg font-bold text-gray-800">Edit Data Pengguna</h1>
            </header>

            <main class="p-8 flex justify-center">
                <div class="bg-white p-6 rounded border border-gray-300 max-w-lg">
                    
                    <form action="../backend/proses_edit_petugas.php" method="POST" class="space-y-4">
                        <input type="hidden" name="id_user" value="<?= $data['id_user'] ?>">

                        <div>
                            <label class="block text-sm font-semibold mb-1">Nama Lengkap:</label>
                            <input type="text" name="nama_user" value="<?= $data['nama_user'] ?>" required class="w-full border border-gray-300 p-2 text-sm rounded">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold mb-1">Username:</label>
                            <input type="text" name="username" value="<?= $data['username'] ?>" required class="w-full border border-gray-300 p-2 text-sm rounded">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold mb-1">Password (Kosongkan jika tidak ingin mengubah sandi):</label>
                            <input type="password" name="password" class="w-full border border-gray-300 p-2 text-sm rounded">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold mb-1">Level Akses:</label>
                            <select name="level" required class="w-full border border-gray-300 p-2 text-sm rounded">
                                <option value="Administrator" <?= ($data['level'] == 'Administrator') ? 'selected' : '' ?>>Administrator</option>
                                <option value="Petugas" <?= ($data['level'] == 'Petugas') ? 'selected' : '' ?>>Petugas</option>
                            </select>
                        </div>

                        <div class="pt-2 flex items-center space-x-2">
                            <button type="submit" class="bg-blue-600 text-white px-4 py-2 text-sm rounded hover:bg-blue-700">Simpan Perubahan</button>
                            <a href="daftar_petugas.php" class="bg-gray-200 text-gray-700 px-4 py-2 text-sm rounded hover:bg-gray-300">Batal / Kembali</a>
                        </div>
                    </form>

                </div>
            </main>

        </div>

    </div>

</body>

</html>