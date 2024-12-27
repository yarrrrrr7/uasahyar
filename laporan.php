<?php
// Konfigurasi database
$host = "localhost"; // Sesuaikan dengan host database Anda
$user = "root";      // Username database
$pass = "";          // Password database (kosong jika default)
$db = "mapala_registration"; // Ganti dengan nama database Anda

// Membuat koneksi
$conn = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Fungsi untuk cek query
function checkQuery($query, $conn) {
    $result = $conn->query($query);
    if (!$result) {
        die("Query gagal: " . $conn->error);
    }
    return $result;
}

// Query untuk mendapatkan data dari tabel
$queryActivityLogs = "SELECT * FROM activity_logs";
$queryPendaftaran = "SELECT * FROM pendaftaran";
$queryUsers = "SELECT * FROM users";

$resultActivityLogs = checkQuery($queryActivityLogs, $conn);
$resultPendaftaran = checkQuery($queryPendaftaran, $conn);
$resultUsers = checkQuery($queryUsers, $conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .no-print {
            margin-bottom: 20px;
        }
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="no-print">
        <button onclick="window.print()">Cetak Laporan</button>
    </div>

    <h1>Laporan</h1>

    <h2>Activity Logs</h2>
    <table>
        <tr>
            <?php if ($resultActivityLogs->num_rows > 0) {
                $columns = $resultActivityLogs->fetch_fields();
                foreach ($columns as $column) {
                    echo "<th>" . $column->name . "</th>";
                }
            ?>
        </tr>
        <?php
            while ($row = $resultActivityLogs->fetch_assoc()) {
                echo "<tr>";
                foreach ($row as $data) {
                    echo "<td>" . htmlspecialchars($data) . "</td>";
                }
                echo "</tr>";
            }
            } else {
                echo "<tr><td colspan='100%'>Tidak ada data</td></tr>";
            }
        ?>
    </table>

    <h2>Pendaftaran</h2>
    <table>
        <tr>
            <?php if ($resultPendaftaran->num_rows > 0) {
                $columns = $resultPendaftaran->fetch_fields();
                foreach ($columns as $column) {
                    echo "<th>" . $column->name . "</th>";
                }
            ?>
        </tr>
        <?php
            while ($row = $resultPendaftaran->fetch_assoc()) {
                echo "<tr>";
                foreach ($row as $data) {
                    echo "<td>" . htmlspecialchars($data) . "</td>";
                }
                echo "</tr>";
            }
            } else {
                echo "<tr><td colspan='100%'>Tidak ada data</td></tr>";
            }
        ?>
    </table>

    <h2>Users</h2>
    <table>
        <tr>
            <?php if ($resultUsers->num_rows > 0) {
                $columns = $resultUsers->fetch_fields();
                foreach ($columns as $column) {
                    echo "<th>" . $column->name . "</th>";
                }
            ?>
        </tr>
        <?php
            while ($row = $resultUsers->fetch_assoc()) {
                echo "<tr>";
                foreach ($row as $data) {
                    echo "<td>" . htmlspecialchars($data) . "</td>";
                }
                echo "</tr>";
            }
            } else {
                echo "<tr><td colspan='100%'>Tidak ada data</td></tr>";
            }
        ?>
    </table>

    <?php
    // Tutup koneksi
    $conn->close();
    ?>
</body>
</html>
