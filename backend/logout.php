<?php
session_start();
session_destroy();
header("Location: /UkkKasirProject/frontend/login.php");
?>