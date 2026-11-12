<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if (!isset($_SESSION['id_user'])): ?>
        <h2>Login Aplikasi Kasir</h2>
        <form method="POST" action="/UkkKasirProject/backend/login_controller.php">
            Username: <input type="text" name="username" required><br><br>
            Password: <input type="password" name="password" required><br><br>
            <button type="submit" name="login">Masuk</button>
        </form>
    <?php endif; ?>
</body>
</html>