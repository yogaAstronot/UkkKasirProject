<?php
include __DIR__ . '/../backend/produk_controller.php';
include_once __DIR__ . '/../backend/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Produk</title>
</head>

<body>
    <a href="/UkkKasirProject/petugas/petugas_dashboard.php">Kembali ke Menu</a>
    <h3>Data Produk</h3>

    <h3>Daftar Produk yang Tersedia</h3>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
        <?php
        $result = $conn->query("SELECT * FROM produk");
        while ($row = $result->fetch_assoc()):
        ?>
            <tr>
                <td><?= $row['ProdukID'] ?></td>
                <td><?= $row['NamaProduk'] ?></td>
                <td>Rp <?= number_format($row['Harga'], 0, ',', '.') ?></td>
                <td><?= $row['Stok'] ?></td>
                <td>
                    <!-- Tombol Edit & Hapus per baris data -->
                    <a href="edit_produk.php?ProdukID=<?= $row['ProdukID'] ?>">Edit</a> | 
                    <a href="../backend/hapus_produk.php?ProdukID=<?= $row['ProdukID'] ?>" onclick="return confirm('Yakin ingin menghapus produk ini?')">Hapus</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>

</html>