<?php
require 'koneksi.php';
if (!isset($_SESSION['id_user'])) { header("Location: index.php"); }

// Proses Tambah Produk
if (isset($_POST['simpan'])) {
    $nama = $_POST['NamaProduk'];
    $harga = $_POST['Harga'];
    $stok = $_POST['Stok'];
    $conn->query("INSERT INTO produk (NamaProduk, Harga, Stok) VALUES ('$nama', '$harga', '$stok')");
    header("Location: produk.php");
}
?>