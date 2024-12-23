<?php
require 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM users WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $nomor_hp = $_POST['nomor_hp'];
    $pendidikan_terakhir = $_POST['pendidikan_terakhir'];

    $update_query = "UPDATE users SET 
        username = '$username',
        email = '$email',
        nama_lengkap = '$nama_lengkap',
        jenis_kelamin = '$jenis_kelamin',
        alamat = '$alamat',
        nomor_hp = '$nomor_hp',
        pendidikan_terakhir = '$pendidikan_terakhir'
        WHERE id = $id";
    
    if (mysqli_query($conn, $update_query)) {
        header("Location: users_list.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Pengguna</title>
</head>
<body>
    <h2>Edit Data Pengguna</h2>
    <form action="update_user.php" method="POST">
        <input type="hidden" name="id" value="<?= $user['id']; ?>">
        Username: <input type="text" name="username" value="<?= $user['username']; ?>" required><br>
        Email: <input type="email" name="email" value="<?= $user['email']; ?>" required><br>
        Nama Lengkap: <input type="text" name="nama_lengkap" value="<?= $user['nama_lengkap']; ?>" required><br>
        Jenis Kelamin:
        <input type="radio" name="jenis_kelamin" value="L" <?= $user['jenis_kelamin'] == 'L' ? 'checked' : ''; ?>> Laki-laki
        <input type="radio" name="jenis_kelamin" value="P" <?= $user['jenis_kelamin'] == 'P' ? 'checked' : ''; ?>> Perempuan<br>
        Alamat: <textarea name="alamat" required><?= $user['alamat']; ?></textarea><br>
        Nomor HP: <input type="text" name="nomor_hp" value="<?= $user['nomor_hp']; ?>" required><br>
        Pendidikan Terakhir: <input type="text" name="pendidikan_terakhir" value="<?= $user['pendidikan_terakhir']; ?>" required><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>