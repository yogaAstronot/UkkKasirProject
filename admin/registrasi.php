<?php
?>
<!DOCTYPE html>
<html>

<body>
    <a href="/UkkKasirProject/admin/admin_dashboard.php">Kembali ke Menu</a>
    <hr>
    <h3>Registrasi Petugas / Admin Baru</h3>

    <li><a href="/UkkKasirProject/admin/produk.php">Data Produk</a></li>
    <li><a href="/UkkKasirProject/admin/transaksi.php">Transaksi Penjualan</a></li>
    <li><a href="/UkkKasirProject/admin/stok_produk.php">Stok Produk</a></li>
    <li><a href="registrasi.php">Registrasi Petugas</a></li>
    <li><a href="daftar_petugas.php">Daftar Petugas</a></li>

    <form method="POST" , action="/UkkKasirProject/backend/registrasi_controller.php">
        Nama Lengkap:<br>
        <input type="text" name="nama_user" required><br><br>

        Username:<br>
        <input type="text" name="username" required><br><br>

        Password:<br>
        <input type="password" name="password" required><br><br>

        Level Akses:<br>
        <select name="level" required>
            <option value="petugas">Petugas (Kasir)</option>
            <option value="administrator">Administrator</option>
        </select><br><br>

        <button type="submit" name="register">Daftarkan Pengguna</button>
    </form>
    <br>
</body>

</html>