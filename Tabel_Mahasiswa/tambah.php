<?php
require '../config/connect_db.php';
require '../function.php';
require_once '../session.php';

// Mengambil id_pengguna dari Sesi
$id_pengguna = $_SESSION["id_pengguna"];

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
    // cek apakah data berhasil ditambahkan atau tidak
    if (tambah1($_POST) > 0) {
        echo "
            <script>
                alert('Data berhasil ditambahkan');
                document.location.href = ../index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal ditambahkan');
                document.location.href = '../index.php';
            </script>
        ";

    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiwa</title>
    <link rel="stylesheet" href="../style/tambah.css">

    <style>
        .container {
            height: 580px;
        }
    </style>

</head>
<body>
    <div class="container">
        <h1>Tambah Data Mahasiwa</h1>

        <form action="" method="post">

            <!-- Required berfungsi agar membuat form tidak diinput kosong oleh user
        -->
            <div>
                <!-- autofocus berfungsi mengarahkan user ke form ini (nama)
                    value berfungsi memasukan langsung nilai pada form input tersebut
                -->
                <input type="text" name="NIM" placeholder="Masukkan NIM" autofocus required>
            </div>
            <br>
            <div>
                <input type="text" name="nama" placeholder="Masukkan nama" required>
            </div>
            <br>
            <div>
                <input type="text" name="jenis_kelamin" placeholder="Masukkan jenis_kelamin" required>
            </div>
            <br>
            <div>
                <input type="text" name="tanggal_lahir" placeholder="Masukkan tanggal_lahir" required>
            </div>
            <br>
            <div>
                <input type="text" name="alamat" placeholder="Masukkan alamat" required>
            </div>

            <input type="hidden" name="id_pengguna" value="<?= $id_pengguna?>">
            <br>

            <div>
                <button type="submit" name="submit">Tambah Data</button>
            </div>
        </form>
        <br><br>
    </div>

</body>
</html>