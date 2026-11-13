<?php
require 'koneksi.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $cek = $conn->query("SELECT * FROM users WHERE username='$username' AND password='$password'");
    
    if ($users = mysqli_fetch_array($cek)) 
        {
            switch ($users['level']) {
                case 'administrator':
                    $_SESSION['id_user'] = $users['id_user'];
                    $_SESSION['nama_user'] = $users['nama_user'];
                    $_SESSION['level'] = $users['level'];
                    $_SESSION['status_login'] = true;
                    header("Location: /UkkKasirProject/admin/admin_dashboard.php");
                    break;
                case 'petugas':
                    $_SESSION['id_user'] = $users['id_user'];
                    $_SESSION['nama_user'] = $users['nama_user'];
                    $_SESSION['level'] = $users['level'];
                    $_SESSION['status_login_admin'] = true;
                    header("Location: /UkkKasirProject/petugas/petugas_dashboard.php");
                    break;
                default:
                    echo "<script>alert('Level user tidak valid!');</script>";
            }

    }
}
?>
