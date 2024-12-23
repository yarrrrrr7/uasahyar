<?php
session_start();
require 'config.php';

$keyword = '';
$results = [];

if (isset($_GET['search'])) {
    $keyword = $_GET['keyword'];
    $query = "SELECT * FROM registrations WHERE name LIKE '%$keyword%' 
              OR email LIKE '%$keyword%' OR phone LIKE '%$keyword%'";
    $results = mysqli_query($conn, $query);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pencarian Data</title>
</head>
<body>
    <h2>Pencarian Data Pendaftaran</h2>
    <form method="GET" action="">
        <input type="text" name="keyword" placeholder="Cari name, email, atau password" value="<?= $keyword; ?>">
        <button type="submit" name="search">Cari</button>
    </form>

    <?php if ($results && mysqli_num_rows($results) > 0): ?>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>password</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Email</th>
            <th>Program Studi</th>
            <th>Tanggal Daftar</th>
        </tr>
        <?php $i = 1; while ($row = mysqli_fetch_assoc($results)): ?>
        <tr>
            <td><?= $i++; ?></td>
            <td><?= $row['name']; ?></td>
            <td><?= $row['password']; ?></td>
            <td><?= $row['email']; ?></td>
            <td><?= $row['gender']; ?></td>
            <td><?= $row['registration_date']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
    <?php elseif (isset($_GET['search'])): ?>
        <p>Data tidak ditemukan!</p>
    <?php endif; ?>
</body>
</html>