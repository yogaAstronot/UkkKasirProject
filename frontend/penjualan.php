<?php
include __DIR__ . '/../backend/penjualan_controller.php';
?>
<!DOCTYPE html>
<html>
<body>
    <a href="index.php">Kembali ke Menu</a>
    <h3>Transaksi Penjualan</h3>
    
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
    <br>
</body>
</html>