<?php
include __DIR__ . '/../backend/detail_controller.php';
?>
<!DOCTYPE html>
<html>
<body>
    <a href="penjualan.php">Kembali</a>
    <h3>Detail Transaksi (ID: <?php echo $id_penjualan ?>)</h3>
    <h2>Total Bayar: Rp <?= $info['TotalHarga'] ?></h2>
    
    <form method="POST">
        Pilih Barang: 
        <select name="ProdukID" required>
            <?php 
            $produk = $conn->query("SELECT * FROM produk WHERE Stok > 0");
            while($p = $produk->fetch_assoc()) {
                echo "<option value='".$p['ProdukID']."'>".$p['NamaProduk']." (Rp ".$p['Harga'].")</option>";
            }
            ?>
        </select>
        Jumlah: <input type="number" name="JumlahProduk" min="1" required>
        <button type="submit" name="tambah_barang">Tambah ke Keranjang</button>
    </form>
    <br>

    <table border="1" cellpadding="5">
        <tr><th>Nama Barang</th><th>Jumlah</th><th>Subtotal</th></tr>
        <?php 
        $detail = $conn->query("SELECT detailpenjualan.*, produk.NamaProduk FROM detailpenjualan JOIN produk ON detailpenjualan.ProdukID = produk.ProdukID WHERE PenjualanID='$id_penjualan'");
        while($row = $detail->fetch_assoc()): 
        ?>
        <tr>
            <td><?= $row['NamaProduk'] ?></td>
            <td><?= $row['JumlahProduk'] ?></td>
            <td>Rp <?= $row['Subtotal'] ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>