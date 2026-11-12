<?php
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="/UkkKasirProject/admin/admin_dashboard.php">Kembali ke Menu</a>
    <h3>Daftar Pengguna Sistem</h3>

    <li><a href="/UkkKasirProject/admin/produk.php">Data Produk</a></li>
    <li><a href="/UkkKasirProject/admin/transaksi.php">Transaksi Penjualan</a></li>
    <li><a href="/UkkKasirProject/admin/stok_produk.php">Stok Produk</a></li>
    <li><a href="registrasi.php">Registrasi Petugas</a></li>
    <li><a href="daftar_petugas.php">Daftar Petugas</a></li>

    <table>
        <tr>
            <th>ID</th>
            <th>Nama Lengkap</th>
            <th>Username</th>
            <th>Level</th>
        </tr>
        <?php
        include __DIR__ . '/../backend/koneksi.php';
        $data = $conn->query("SELECT * FROM users");
        while ($row = $data->fetch_assoc()):
        ?>
            <tr>
                <td><?= $row['id_user'] ?></td>
                <td><?= $row['nama_user'] ?></td>
                <td><?= $row['username'] ?></td>
                <td><?= $row['level'] ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>

</html>