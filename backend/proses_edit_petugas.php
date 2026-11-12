<?php
include __DIR__ . '/../backend/koneksi.php';

$id_user = $_POST['id_user'];
$nama_user = $_POST['nama_user'];
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];

if (empty($password)) {
    $query = "UPDATE users SET 
                nama_user = '$nama_user', 
                username = '$username', 
                level = '$level' 
              WHERE id_user = '$id_user'";
} else {
    $password_md5 = md5($password);
    $query = "UPDATE users SET 
                nama_user = '$nama_user', 
                username = '$username', 
                password = '$password_md5', 
                level = '$level' 
              WHERE id_user = '$id_user'";
}

$update = mysqli_query($conn, $query);

if ($update) {
    echo "<script>alert('Data petugas berhasil diubah!'); window.location.href='../admin/daftar_petugas.php';</script>";
} else {
    echo "<script>alert('Gagal mengubah data!'); window.location.href='../admin/daftar_petugas.php';</script>";
}
?>