<?php
require 'koneksi.php';
if (!isset($_SESSION['id_user'])) { header("Location: index.php"); }

if (isset($_POST['buat_transaksi'])) {
    $tanggal = $_POST['TanggalPenjualan'];
    $pelanggan_id = $_POST['PelangganID'];
    
    $conn->query("INSERT INTO penjualan (TanggalPenjualan, TotalHarga, PelangganID) VALUES ('$tanggal', 0, '$pelanggan_id')");
    header("Location: penjualan.php");
}
?>