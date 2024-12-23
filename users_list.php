<?php
require 'config.php'; // File koneksi database

// Inisialisasi variabel pencarian
$search = '';
if (isset($_GET['search'])) {
    $search = $_GET['search'];
}

// Query untuk mengambil data dengan fitur pencarian
$query = "SELECT id, username, password, level FROM users";
if ($search) {
    $query .= " WHERE username LIKE '%$search%' OR level LIKE '%$search%'";
}

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Users</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        table th {
            background-color: #f2f2f2;
        }
        h2 {
            text-align: center;
        }
        .search-box {
            margin: 10px 0;
            text-align: center;
        }
        .search-box input {
            padding: 7px;
            width: 200px;
        }
        .search-box button {
            padding: 7px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h2>Daftar Pengguna</h2>

    <!-- Form Pencarian -->
    <div class="search-box">
        <form action="" method="GET">
            <input type="text" name="search" placeholder="Cari Username atau Level" value="<?= htmlspecialchars($search); ?>">
            <button type="submit">Cari</button>
        </form>
    </div>

    <!-- Tabel Data Users -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Password</th>
                <th>Level</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (mysqli_num_rows($result) > 0): ?>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= htmlspecialchars($row['username']); ?></td>
                    <td><?= htmlspecialchars($row['password']); ?></td>
                    <td><?= htmlspecialchars($row['level']); ?></td>
                    <td>
                        <a href="edit_user.php?id=<?= $row['id']; ?>">Edit</a> | 
                        <a href="delete_user.php?id=<?= $row['id']; ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">Tidak ada data pengguna ditemukan.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>