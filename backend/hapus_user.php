<?php
include __DIR__ . '/koneksi.php';

if (isset($_GET['id_user'])) {
    $id_user = $_GET['id_user'];

    $query = "DELETE FROM users WHERE id_user = '$id_user'";
    $hapus = mysqli_query($conn, $query);

    if ($hapus) {
        echo "<script>alert('Data user berhasil dihapus!'); window.location.href='../admin/daftar_petugas.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data!'); window.location.href='../admin/daftar_petugas.php';</script>";
    }
} else {
    echo "<script>alert('ID User tidak ditemukan!'); window.location.href='../admin/daftar_petugas.php';</script>";
}
?>