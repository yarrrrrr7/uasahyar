<?php
// Koneksi database
$conn = new mysqli('localhost', 'root', '', 'mapala_registration');

if ($conn->connect_error) {
    die("Koneksi database gagal: " . $conn->connect_error);
}

$message = ""; // Variabel untuk pesan sukses atau error

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_lengkap = $_POST['nama_lengkap'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Enkripsi password
    $email = $_POST['email'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $nomor_hp = $_POST['nomor_hp'];
    $alamat = $_POST['alamat'];
    $tanggal_lahir = $_POST['tanggal_lahir'];

    // Upload gambar
    $gambar = $_FILES['gambar']['name'];
    $target = "uploads/" . basename($gambar);
    move_uploaded_file($_FILES['gambar']['tmp_name'], $target);

    // Query simpan ke tabel users
    $query = "INSERT INTO users (nama_lengkap, username, password, email, jenis_kelamin, nomor_hp, alamat, tanggal_lahir) 
              VALUES ('$nama_lengkap', '$username', '$password', '$email', '$jenis_kelamin','nomor_hp','alamat', 'tanggal_lahir')";

    if ($conn->query($query) === TRUE) {
        // Jika pendaftaran berhasil
        $message = "Pendaftaran berhasil! <a href='login.php'>Klik di sini untuk login</a>";
    } else {
        $message = "Gagal mendaftar: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Pendaftaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
        }
        h1 {
            text-align: center;
        }
        form {
            width: 50%;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input, select, textarea {
            width: 100%;
            margin: 10px 0;
            padding: 10px;
        }
        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        .message {
            text-align: center;
            margin-top: 20px;
            font-weight: bold;
            color: green;
        }
    </style>
</head>
<body>
    <h1>Form Pendaftaran</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="nama_lengkap">Nama Lengkap:</label>
        <input type="text" name="nama_lengkap" required>

        <label for="username">Username:</label>
        <input type="text" name="username" required>

        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <label for="jenis_kelamin">Jenis Kelamin:</label>
        <select name="jenis_kelamin" required>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>

        <label for="nomor_hp">Nomor Hp:</label>
        <input type="text" name="nomor_hp" required>

        <label for="alamat">Alamat:</label>
        <textarea name="alamat" rows="4" required></textarea>

        <label for="tanggal_lahir">Tanggal Lahir:</label>
        <input type="date" name="tanggal_lahir" required>

        <label for="gambar">Unggah Foto:</label>
        <input type="file" name="gambar" required>

        <button type="submit">Daftar</button>
    </form>

    <!-- Pesan berhasil -->
    <div class="message">
        <?= $message; ?>
    </div>
</body>
</html>