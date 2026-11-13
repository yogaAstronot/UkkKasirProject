<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <a href="/UkkKasirProject/admin/admin_dashboard.php">Kembali ke Menu</a>

    <ul>
        <li><a href="/UkkKasirProject/admin/produk.php">Data Produk</a></li>
        <li><a href="/UkkKasirProject/admin/transaksi.php">Transaksi Penjualan</a></li>
        <li><a href="/UkkKasirProject/admin/stok_produk.php">Stok Produk</a></li>
        <li><a href="registrasi.php">Registrasi Petugas</a></li>
        <li><a href="daftar_petugas.php">Daftar Petugas</a></li>
    </ul>

     <form method="POST">
        Tanggal: <input type="date" name="TanggalPenjualan" required>
        Pelanggan: 
        <select name="PelangganID" required>
            <?php 
            $pelanggan = $conn->query("SELECT * FROM pelanggan");
            while($p = $pelanggan->fetch_assoc()) {
                echo "<option value='".$p['PelangganID']."'>".$p['NamaPelanggan']."</option>";
            }
            ?>
        </select>
        <button type="submit" name="buat_transaksi">Buat Transaksi</button>
    </form>

    <table border="1" cellpadding="5">
        <tr>
            <th>ID Transaksi</th>
            <th>Tanggal</th>
            <th>Total Harga</th>
            <th>Aksi</th>
        </tr>
        <?php
        include __DIR__ . '/../backend/koneksi.php';
        $data = $conn->query("SELECT * FROM penjualan ORDER BY PenjualanID DESC");
        while ($row = $data->fetch_assoc()):
        ?>
            <tr>
                <td><?= $row['PenjualanID'] ?></td>
                <td><?= $row['TanggalPenjualan'] ?></td>
                <td>Rp <?= $row['TotalHarga'] ?></td>
                <td>
                    <a href="/UkkKasirProject/frontend/detail.php?id=<?= $row['PenjualanID'] ?>">Isi Keranjang</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>

</html>