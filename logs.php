<?php
session_start();
require 'config.php';

if (!isset($_SESSION['user_id'])) {
    echo "Anda harus login terlebih dahulu.";
    exit;
}

$user_id = $_SESSION['user_id'];

// Ambil log aktivitas pengguna
$query = "SELECT * FROM activity_logs WHERE user_id = '$user_id' ORDER BY tanggal_aktivitas DESC";
$result = mysqli_query($conn, $query);

echo "<h2>Log Aktivitas</h2>";
if (mysqli_num_rows($result) > 0) {
    echo "<table border='1'>
            <tr>
                <th>Aktivitas</th>
                <th>Tanggal</th>
            </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['aktivitas']}</td>
                <td>{$row['tanggal_aktivitas']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "Belum ada aktivitas.";
}
?>