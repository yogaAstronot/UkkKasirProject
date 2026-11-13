<?php
include __DIR__ . '/../backend/koneksi.php';

if (empty($_GET['ProdukID'])) {
    echo "<script>alert('ID Produk tidak ditemukan!'); window.location.href='produk.php';</script>";
    exit();
}

$ProdukID = $_GET['ProdukID'];
$query = $conn->query("SELECT * FROM produk WHERE ProdukID = '$ProdukID'");
$data = $query->fetch_assoc();

if (!$data) {
    echo "<script>alert('Data produk tidak ditemukan!'); window.location.href='produk.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6 md:p-10 font-sans text-gray-800 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-lg bg-white rounded-lg p-8 border-t-4 border-[#023047]">
        
        <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-3">Edit Data Produk</h2>

        <form action="../backend/petugas_produk_edit.php" method="POST" class="space-y-5">
            
            <input type="hidden" name="ProdukID" value="<?= $data['ProdukID'] ?>">

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Produk</label>
                <input type="text" name="NamaProduk" value="<?= htmlspecialchars($data['NamaProduk']) ?>" required 
                       class="w-full border border-gray-300 p-2.5 rounded-md outline-none focus:ring-2 focus:ring-[#023047] transition-all">
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Harga (Rp)</label>
                <input type="number" name="Harga" value="<?= $data['Harga'] ?>" required 
                       class="w-full border border-gray-300 p-2.5 rounded-md outline-none focus:ring-2 focus:ring-[#023047] transition-all">
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Stok</label>
                <input type="number" name="Stok" value="<?= $data['Stok'] ?>" required 
                       class="w-full border border-gray-300 p-2.5 rounded-md outline-none focus:ring-2 focus:ring-[#023047] transition-all">
            </div>

            <div class="flex items-center justify-between pt-4 mt-2">
                <a href="produk.php" class="text-gray-500 hover:text-red-500 text-sm font-medium transition-colors">
                    Batalkan
                </a>
                <button type="submit" class="bg-blue-600 text-white px-6 py-2.5 rounded-md font-bold hover:bg-blue-700 transition-colors shadow-sm">
                    Simpan Perubahan
                </button>
            </div>

        </form>
    </div>

</body>
</html>