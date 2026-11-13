<?php
require 'koneksi.php';

if (!isset($_SESSION['id_user'])) { 
    header("Location: index.php"); 
    exit;
}

if ($_SESSION['level'] != 'administrator') {
    echo "<script>alert('Akses Ditolak! Hanya Administrator yang bisa mendaftarkan petugas.'); window.location='index.php';</script>";
    exit;
}

if (isset($_POST['register'])) {
    $nama = $_POST['nama_user'];
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $level = $_POST['level'];

    $cek_username = $conn->query("SELECT * FROM users WHERE username='$user'");
    
    if ($cek_username->num_rows > 0) {
        echo "<script>alert('Gagal! Username sudah dipakai, silakan cari username lain.');</script>";
    } else {
        $conn->query("INSERT INTO users (nama_user, username, password, level) VALUES ('$nama', '$user', '$pass', '$level')");
        echo "<script>alert('Registrasi berhasil!'); window.location='../admin/daftar_petugas.php';</script>";}
}
?>