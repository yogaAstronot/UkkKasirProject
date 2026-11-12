<?php
require 'koneksi.php';
if (!isset($_SESSION['id_user'])) { header("Location: index.php"); }

if (isset($_POST['simpan'])) {
    $nama = $_POST['NamaPelanggan'];
    $alamat = $_POST['Alamat'];
    $telp = $_POST['NomorTelepon'];
    $conn->query("INSERT INTO pelanggan (NamaPelanggan, Alamat, NomorTelepon) VALUES ('$nama', '$alamat', '$telp')");
    header("Location: pelanggan.php");
}
?>