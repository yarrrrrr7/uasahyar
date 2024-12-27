<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

echo "Selamat datang, " . $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pendaftaran Mapala</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .sidebar {
            width: 250px;
            background-color: #2c3e50;
            color: white;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            padding: 20px 10px;
        }
        .sidebar h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .sidebar a {
            display: block;
            color: white;
            text-decoration: none;
            margin: 10px 0;
            padding: 10px;
            border-radius: 5px;
        }
        .sidebar a:hover {
            background-color: #34495e;
        }
        .main-content {
            margin-left: 250px;
            padding: 20px;
            background-color: #ecf0f1;
            height: 100vh;
            overflow-y: auto;
        }
        .card {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .card h3 {
            margin: 0 0 10px;
        }
        .stats-container {
            display: flex;
            gap: 20px;
        }
        .stat {
            flex: 1;
            text-align: center;
            background-color: #3498db;
            color: white;
            padding: 20px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Mapala Dashboard</h2>
        <a href="#home">Home</a>
        <a href="#pendaftaran">Pendaftaran</a>
        <a href="#anggota">Anggota</a>
        <a href="#kegiatan">Kegiatan</a>
        <a href="#statistik">Statistik</a>
        <a href="#pengaturan">Pengaturan</a>
         <a href="#laporan">laporan</a>
    </div>

    <div class="main-content">
        <div class="card">
            <h3>Selamat Datang di Dashboard Mapala!</h3>
            <p>Kelola pendaftaran anggota, lihat statistik, dan rencanakan kegiatan dengan mudah.</p>
        </div>

        <div class="stats-container">
            <div class="stat">
                <h3>50</h3>
                <p>Pendaftar Baru</p>
            </div>
            <div class="stat">
                <h3>120</h3>
                <p>Anggota Aktif</p>
            </div>
            <div class="stat">
                <h3>10</h3>
                <p>Kegiatan Mendatang</p>
            </div>
        </div>

        <div class="card">
            <h3>Kegiatan Mendatang</h3>
            <ul>
                <li>Ekspedisi Gunung Rinjani - 20 Desember 2024</li>
                <li>Pelatihan Dasar Survival - 5 Januari 2025</li>
                <li>Bakti Sosial Lingkungan - 15 Januari 2025</li>
            </ul>
        </div>
    </div>
</body>
</html>
