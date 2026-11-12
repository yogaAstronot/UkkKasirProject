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
</head>
<body>
    <h3>Edit Data Produk</h3>

    <form action="../backend/petugas_produk_edit.php" method="POST">
        <input type="hidden" name="ProdukID" value="<?= $data['ProdukID'] ?>">

        <label>Nama Produk:</label><br>
        <input type="text" name="NamaProduk" value="<?= $data['NamaProduk'] ?>" required>
        <br><br>

        <label>Harga:</label><br>
        <input type="number" name="Harga" value="<?= $data['Harga'] ?>" required>
        <br><br>

        <label>Stok:</label><br>
        <input type="number" name="Stok" value="<?= $data['Stok'] ?>" required>
        <br><br>

        <button type="submit">Simpan Perubahan</button>
        <a href="produk.php">Batal / Kembali</a>
    </form>
</body>
</html>