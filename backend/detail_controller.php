<?php
require 'koneksi.php';
if (!isset($_SESSION['id_user'])) { header("Location: index.php"); }

$id_penjualan = $_GET['id'];

if (isset($_POST['tambah_barang'])) {
    $ProdukID = $_POST['ProdukID'];
    $jumlah = $_POST['JumlahProduk'];

    $cek_produk = $conn->query("SELECT Harga, Stok FROM produk WHERE ProdukID = '$ProdukID'");
    $data_produk = $cek_produk->fetch_assoc();
    
    $harga = $data_produk['Harga'];
    $stok_tersedia = $data_produk['Stok'];
    $subtotal = $harga * $jumlah;

    if ($stok_tersedia <= 0) {
        echo "<script>alert('Barang sudah habis!'); window.location.href='detail.php?id=$id_penjualan';</script>";
        exit();
    } elseif ($jumlah > $stok_tersedia) {
        echo "<script>alert('Maaf, jumlah melebihi stok! Stok sisa: $stok_tersedia'); window.location.href='detail.php?id=$id_penjualan';</script>";
        exit();
    } else {

        $conn->query("INSERT INTO detailpenjualan (PenjualanID, ProdukID, JumlahProduk, Subtotal) VALUES ('$id_penjualan', '$ProdukID', '$jumlah', '$subtotal')");

        $conn->query("UPDATE produk SET Stok = Stok - $jumlah WHERE ProdukID = '$ProdukID'");

        $conn->query("UPDATE penjualan SET TotalHarga = TotalHarga + $subtotal WHERE PenjualanID = '$id_penjualan'");

        header("Location: detail.php?id=$id_penjualan");
        exit();
    }
}
$info = $conn->query("SELECT * FROM penjualan WHERE PenjualanID='$id_penjualan'")->fetch_assoc();
?>