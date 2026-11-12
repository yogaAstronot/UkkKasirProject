<?php
include __DIR__ . '/koneksi.php';

if (isset($_GET['ProdukID'])) {
    $ProdukID = $_GET['ProdukID'];

    $query = "DELETE FROM produk WHERE ProdukID = '$ProdukID'";
    $hapus = mysqli_query($conn, $query);

    if ($hapus) {   
        echo "<script>alert('Produk berhasil dihapus!'); window.location.href='../admin/produk.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus produk!'); window.location.href='../admin/produk.php';</script>";
    }
} else {
    echo "<script>alert('ID Produk tidak ditemukan!'); window.location.href='../admin/produk.php';</script>";
}
?>