<?php
session_start();
require 'config.php';

// Pastikan pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    echo "Anda harus login terlebih dahulu.";
    exit;
}

$user_id = $_SESSION['user_id'];

// Ambil data pendaftaran berdasarkan user_id
$query = "SELECT * FROM pendaftaran WHERE user_id = '$user_id'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    echo "<table border='1'>
            <tr>
                <th>Nama_Lengkap</th>
                <th>Nomor HP</th>
                <th>Alamat</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Gambar</th>
            </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['nama_lengkap']}</td>
                <td>{$row['nomor_hp']}</td>
                <td>{$row['alamat']}</td>
                <td>{$row['tanggal_lahir']}</td>
                <td>{$row['jenis_kelamin']}</td>
                <td><img src='{$row['gambar']}' width='100'></td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "Belum ada data pendaftaran.";
}
?>