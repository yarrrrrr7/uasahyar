<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST[''];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Enkripsi password
    $nama_lengkap = $_POST['nama_lengkap'];
    $gambar = '';

    // Proses upload gambar
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == UPLOAD_ERR_OK) {
        $target_dir = "uploads/";
        $gambar_name = basename($_FILES["gambar"]["name"]);
        $target_file = $target_dir . $gambar_name;
        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
            $gambar = $target_file;
        } else {
            echo "Gagal mengunggah gambar.";
            exit;
        }
    }

    // Simpan data ke tabel users
    $query = "INSERT INTO users (username, email, password, level) VALUES ('$username', '$email', '$password', 'staff')";
    if (mysqli_query($conn, $query)) {
        $user_id = mysqli_insert_id($conn); // Ambil user_id yang baru dimasukkan

        // Simpan log aktivitas
        $aktivitas = "Pendaftaran akun baru: $username";
        $log_query = "INSERT INTO activity_logs (user_id, aktivitas) VALUES ('$user_id', '$aktivitas')";
        mysqli_query($conn, $log_query);

        echo "Pendaftaran berhasil! Silakan login.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registrasi Akun</title>
</head>
<body>
    <h2>Form Registrasi</h2>
    <form action="registrasi.php" method="POST" enctype="multipart/form-data">
        Username: <input type="text" name="username" required><br>
        Email: <input type="email" name="email" required><br>
        Password: <input type="password" name="password" required><br>
        Nama Lengkap: <input type="text" name="nama_lengkap" required><br>
        Upload Gambar: <input type="file" name="gambar" accept="image/*" required><br>
        <button type="submit">Daftar</button>
    </form>
</body>
</html>s