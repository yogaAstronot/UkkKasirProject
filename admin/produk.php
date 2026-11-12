<?php
include __DIR__ . '/../backend/produk_controller.php';
?>
<!DOCTYPE html>
<html>
<body>
    <a href="/UkkKasirProject/admin/admin_dashboard.php">Kembali ke Menu</a>
    <h3>Data Produk</h3>

     <li><a href="/UkkKasirProject/admin/produk.php">Data Produk</a></li>
            <li><a href="/UkkKasirProject/admin/transaksi.php">Transaksi Penjualan</a></li>
            <li><a href="/UkkKasirProject/admin/stok_produk.php">Stok Produk</a></li>
            <li><a href="registrasi.php">Registrasi Petugas</a></li>
            <li><a href="daftar_petugas.php">Daftar Petugas</a></li>
    
    <form method="POST">
        Nama: <input type="text" name="NamaProduk" required>
        Harga: <input type="number" name="Harga" required>
        Stok: <input type="number" name="Stok" required>
        <button type="submit" name="simpan">Simpan</button>
    </form>
    <br>
</body>
</html>