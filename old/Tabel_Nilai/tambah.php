<?php
include 'function.php';

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
    // cek apakah data berhasil ditambahkan atau tidak
    if (tambah($_POST) > 0) {
        echo "
            <script>
                alert('Data berhasil ditambahkan');
                document.location.href = 'page_nilai.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal ditambahkan');
                document.location.href = 'page_nilai.php';
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
    <title>Tambah Data Nilai</title>
    <link rel="stylesheet" href="../style/tambah.css">

    <style>
        .container {
            height: 580px;
        }
    </style>

</head>
<body>
    <div class="container">
        <h1>Tambah Data Nilai</h1>

        <form action="" method="post">

            <!-- Required berfungsi agar membuat form tidak diinput kosong oleh user
        -->
            <div>
                <!-- autofocus berfungsi mengarahkan user ke form ini (nama)
                    value berfungsi memasukan langsung nilai pada form input tersebut
                -->
                <input type="text" name="id_nilai" placeholder="Masukkan id_nilai" autofocus required>
            </div>
            <br>
            <div>
                <input type="text" name="NIM" placeholder="Masukkan NIM" required>
            </div>
            <br>
            <div>
                <input type="text" name="kode_matkul" placeholder="Masukkan kode_matkul" required>
            </div>
            <br>
            <div>
                <input type="text" name="nilai" placeholder="Masukkan nilai" required>
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