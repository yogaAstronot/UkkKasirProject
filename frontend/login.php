<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-gray-100">
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
            <?php if (!isset($_SESSION['id_user'])): ?>
                <div class="text-center mb-6">
                    <h1 class="text-2xl font-bold text-gray-800">Selamat Datang di EasyCasier</h1>
                    <p class="text-gray-600">Silakan masuk untuk melanjutkan</p>
                </div>
                <form method="POST" action="/UkkKasirProject/backend/login_controller.php">
                    <div class="mb-4">
                        <label for="username" class="block text-gray-700 font-semibold mb-2">Username</label>
                        <input type="text" name="username" id="username" required class="bg-gray-100 border border-gray-300 rounded py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-500 w-full">
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-gray-700 font-semibold mb-2">Password</label>
                        <input type="password" name="password" id="password" required class="bg-gray-100 border border-gray-300 rounded py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-500 w-full">
                    </div>
                    <div class="flex justify-center">
                        <button type="submit" name="login" class="bg-blue-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded ">Masuk</button>

                    </div>
                </form>
            <?php endif; ?>
        </div>
    </div>

</body>

</html>