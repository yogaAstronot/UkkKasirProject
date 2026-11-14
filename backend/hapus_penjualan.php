<?php
include __DIR__ . '/koneksi.php';

if (isset($_GET['PenjualanID'])) {
    $PenjualanID = $_GET['PenjualanID'];

    mysqli_query($conn, "DELETE FROM detailpenjualan WHERE PenjualanID = '$PenjualanID'");
    $query = "DELETE FROM penjualan WHERE PenjualanID = '$PenjualanID'";
    $hapus = mysqli_query($conn, $query);

    if ($hapus) {
        echo "<script>alert('Data penjualan berhasil dihapus!'); window.location.href='../admin/admin_dashboard.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data penjualan!'); window.location.href='../admin/admin_dashboard.php';</script>";
    }
} else {
    echo "<script>alert('ID Penjualan tidak ditemukan!'); window.location.href='../admin/admin_dashboard.php';</script>";
}
?>