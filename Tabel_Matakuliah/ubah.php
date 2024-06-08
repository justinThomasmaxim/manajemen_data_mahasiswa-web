<?php
require '../config/connect_db.php';
require '../function.php';

// Ambil data di URL
$kode_matkul = $_GET["kode_matkul"];

// Query data matakuliah berdasarkan kode_matkul
$matakuliah = query2("SELECT * FROM tb_matakuliah WHERE kode_matkul = '$kode_matkul'")[0];

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
    // cek apakah data berhasil diubah atau tidak
    if (ubah2($_POST) > 0) {
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
    <title>Ubah Data Mahasiswa</title>

    <!-- File css -->
    <link rel="stylesheet" href="../style/ubah.css">

    <style>
        .container {
            height: 480px;
        }
    </style>

</head>
<body>
    <div class="container">

        <h1>Ubah Data Mahasiswa</h1>

        <form action="" method="post">

            <!-- Required berfungsi agar membuat form tidak diinput kosong oleh user
        -->
            <div>
                <!-- autofocus berfungsi mengarahkan user ke form ini (nama)
                    value berfungsi memasukan langsung nilai pada form input tersebut
                -->
                <input type="text" name="kode_matkul" placeholder="Masukkan kode_matkul" autofocus required
                value="<?php echo $matakuliah["kode_matkul"]; ?>">
            </div>
            <br>
            <div>
                <input type="text" name="nama_matkul" placeholder="Masukkan nama_matkul" required
                value="<?php echo $matakuliah["nama_matkul"]; ?>">
            </div>
            <br>
            <div>
                <input type="text" name="sks" placeholder="Masukkan sks" required
                value="<?php echo $matakuliah["sks"]; ?>">
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

