<?php
include __DIR__ . '/../backend/pelanggan_controller.php';
?>

<!DOCTYPE html>
<html>
<body>
    <a href="index.php">Kembali ke Menu</a>
    <h3>Data Pelanggan</h3>
    
    <form method="POST">
        Nama: <input type="text" name="NamaPelanggan" required>
        Alamat: <input type="text" name="Alamat" required>
        Telp: <input type="text" name="NomorTelepon" required>
        <button type="submit" name="simpan">Simpan</button>
    </form>
    <br>

    <table border="1" cellpadding="5">
        <tr><th>ID</th><th>Nama</th><th>Alamat</th><th>Telp</th></tr>
        <?php 
        $data = $conn->query("SELECT * FROM pelanggan");
        while($row = $data->fetch_assoc()): 
        ?>
        <tr>
            <td><?= $row['PelangganID'] ?></td>
            <td><?= $row['NamaPelanggan'] ?></td>
            <td><?= $row['Alamat'] ?></td>
            <td><?= $row['NomorTelepon'] ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
