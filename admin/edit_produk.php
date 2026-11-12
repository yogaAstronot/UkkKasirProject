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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans">

    <div class="flex h-screen overflow-hidden">
        <div class="flex-1 flex flex-col overflow-y-auto">
            
            <header class="bg-white border-b border-gray-200 px-8 py-4">
                <h1 class="text-lg font-bold text-gray-800">Edit Data Produk</h1>
            </header>

            <main class="p-8">
                <div class="bg-white p-6 rounded border border-gray-300 max-w-lg">
                    
                    <form action="../backend/proses_edit_produk.php" method="POST" class="space-y-4">
                        <input type="hidden" name="ProdukID" value="<?= $data['ProdukID'] ?>">

                        <div>
                            <label class="block text-sm font-semibold mb-1">Nama Produk:</label>
                            <input type="text" name="NamaProduk" value="<?= $data['NamaProduk'] ?>" required class="w-full border border-gray-300 p-2 text-sm rounded">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold mb-1">Harga:</label>
                            <input type="number" step="0.01" name="Harga" value="<?= $data['Harga'] ?>" required class="w-full border border-gray-300 p-2 text-sm rounded">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold mb-1">Stok:</label>
                            <input type="number" name="Stok" value="<?= $data['Stok'] ?>" required class="w-full border border-gray-300 p-2 text-sm rounded">
                        </div>

                        <div class="pt-2 flex items-center space-x-2">
                            <button type="submit" class="bg-blue-600 text-white px-4 py-2 text-sm rounded hover:bg-blue-700">Simpan Perubahan</button>
                            <a href="produk.php" class="bg-gray-200 text-gray-700 px-4 py-2 text-sm rounded hover:bg-gray-300">Batal / Kembali</a>
                        </div>
                    </form>

                </div>
            </main>

        </div>

    </div>

</body>

</html>