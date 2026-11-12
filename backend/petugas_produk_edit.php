<?php
include __DIR__ . '/koneksi.php';

$ProdukID = $_POST['ProdukID'];
$NamaProduk = $_POST['NamaProduk'];
$Harga = $_POST['Harga'];
$Stok = $_POST['Stok'];

$query = "UPDATE produk SET 
            NamaProduk = '$NamaProduk', 
            Harga = '$Harga', 
            Stok = '$Stok' 
          WHERE ProdukID = '$ProdukID'";

$update = mysqli_query($conn, $query);

if ($update) {
    echo "<script>alert('Data produk berhasil diubah!'); window.location.href='../frontend/produk.php';</script>";
} else {
    echo "<script>alert('Gagal mengubah data produk!'); window.location.href='../frontend/produk.php';</script>";
}
?>