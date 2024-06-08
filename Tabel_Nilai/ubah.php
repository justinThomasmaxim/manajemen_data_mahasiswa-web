<?php
require '../config/connect_db.php';
require '../function.php';

// Ambil data di URL
$id_nilai = $_GET["id_nilai"];

// Query data nilai berdasarkan id_nilai
$nilai = query3("SELECT * FROM tb_nilai WHERE id_nilai = '$id_nilai'")[0];

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
    // cek apakah data berhasil diubah atau tidak
    if (ubah3($_POST) > 0) {
        echo "
            <script>
                alert('Data berhasil diubah');
                document.location.href = '../index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal diubah');
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
    <title>Ubah Data Nilai</title>

    <!-- File css -->
    <link rel="stylesheet" href="../style/ubah.css">

    <style>
        .container {
            height: 580px;
        }
    </style>

</head>
<body>
    <div class="container">

        <h1>Ubah Data Nilai</h1>

        <form action="" method="post">

            <!-- Required berfungsi agar membuat form tidak diinput kosong oleh user
        -->
            <div>
                <!-- autofocus berfungsi mengarahkan user ke form ini (nama)
                    value berfungsi memasukan langsung nilai pada form input tersebut
                -->
                <input type="text" name="id_nilai" placeholder="Masukkan id_nilai" autofocus required
                value="<?php echo $nilai["id_nilai"]; ?>">
            </div>
            <br>
            <div>
                <input type="text" name="NIM" placeholder="Masukkan NIM" required
                value="<?php echo $nilai["NIM"]; ?>">
            </div>
            <br>
            <div>
                <input type="text" name="kode_matkul" placeholder="Masukkan kode_matkul" required
                value="<?php echo $nilai["kode_matkul"]; ?>">
            </div>
            <br>
            <div>
                <input type="text" name="nilai" placeholder="Masukkan nilai" required
                value="<?php echo $nilai["nilai"]; ?>">
            </div>
            <br>
            <div>
                <button type="submit" name="submit">Ubah Data</button>
            </div>
        </form>
        <br><br>
    </div>

  
</body>
</html>

