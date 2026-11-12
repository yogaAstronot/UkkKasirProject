<?php
require 'koneksi.php';
if (!isset($_SESSION['id_user'])) { header("Location: index.php"); }

$id_penjualan = $_GET['id'];

if (isset($_POST['tambah_barang'])) {
    $produk_id = $_POST['ProdukID'];
    $jumlah = $_POST['JumlahProduk'];

    // Cek harga barang
    $cek_produk = $conn->query("SELECT Harga, Stok FROM produk WHERE ProdukID='$produk_id'")->fetch_assoc();
    $harga = $cek_produk['Harga'];
    $subtotal = $harga * $jumlah;

    //simpan
    $conn->query("INSERT INTO detailpenjualan (PenjualanID, ProdukID, JumlahProduk, Subtotal) VALUES ('$id_penjualan', '$produk_id', '$jumlah', '$subtotal')");

    //kurangi
    $conn->query("UPDATE produk SET Stok = Stok - $jumlah WHERE ProdukID='$produk_id'");

    //update
    $conn->query("UPDATE penjualan SET TotalHarga = TotalHarga + $subtotal WHERE PenjualanID='$id_penjualan'");
    header("Location: detail.php?id=$id_penjualan");
}

$info = $conn->query("SELECT * FROM penjualan WHERE PenjualanID='$id_penjualan'")->fetch_assoc();
?>