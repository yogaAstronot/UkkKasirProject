<?php
session_start();
$conn = new mysqli("localhost", "root", "", "sistem_kasir");

if ($conn->connect_error) {
    die("Koneksi gagal!");
}
?>