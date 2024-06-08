<?php
require '../config/connect_db.php';
require '../function.php';

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
    // cek apakah data berhasil ditambahkan atau tidak
    if (tambah2($_POST) > 0) {
        echo "
            <script>
                alert('Data berhasil ditambahkan');
                document.location.href = '../index.php';
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
    <title>Tambah Data Matakuliah</title>
    <link rel="stylesheet" href="../style/tambah.css">

    <style>
        .container {
            height: 480px;
        }
    </style>

</head>
<body>
    <div class="container">
        <h1>Tambah Data Matakuliah</h1>

        <form action="" method="post">

            <!-- Required berfungsi agar membuat form tidak diinput kosong oleh user
        -->
            <div>
                <!-- autofocus berfungsi mengarahkan user ke form ini (nama)
                    value berfungsi memasukan langsung nilai pada form input tersebut
                -->
                <input type="text" name="kode_matkul" placeholder="Masukkan kode_matkul" autofocus required>
            </div>
            <br>
            <div>
                <input type="text" name="nama_matkul" placeholder="Masukkan nama_matkul" required>
            </div>
            <br>
            <div>
                <input type="text" name="sks" placeholder="Masukkan sks" required>
            </div>
            <br>
            <div>
                <button type="submit" name="submit">Tambah Data</button>
            </div>
        </form>
        <br><br>
    </div>

</body>
</html>