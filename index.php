<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Pendaftaran MAPALA</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .menu {
            text-align: center;
            margin-top: 50px;
        }
        .menu a {
            display: inline-block;
            margin: 10px;
            padding: 10px 20px;
            text-decoration: none;
            color: white;
            background-color: #4CAF50;
            border-radius: 5px;
            font-weight: bold;
        }
        .menu a:hover {
            background-color: #45a049;
        }
        .footer {
            text-align: center;
            margin-top: 50px;
            font-size: 14px;
            color: #555;
        }
    </style>
</head>
<body>
    <h1>Selamat Datang di Sistem Informasi Pendaftaran MAPALA</h1>

    <!-- Menu Navigasi -->
    <div class="menu">
        <a href="registrasi.php">Daftar</a>
        <a href="login.php">Login</a>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; <?= date("Y"); ?> Sistem Informasi MAPALA. All rights reserved.</p>
    </div>
</body>
</html>