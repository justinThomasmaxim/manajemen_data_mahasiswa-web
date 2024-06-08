<?php
include 'function.php';

// Ambil data di URL
$NIM = $_GET["NIM"];

// Query data mahaiswa berdasarkan NIM
$mahaiswa = query("SELECT * FROM tb_mahasiswa WHERE NIM = '$NIM'")[0];

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
    // cek apakah data berhasil diubah atau tidak
    if (ubah($_POST) > 0) {
        echo "
            <script>
                alert('Data berhasil diubah');
                document.location.href = 'page_mahasiswa.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal diubah');
                document.location.href = 'page_mahasiswa.php';
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
            height: 580px;
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
                <input type="text" name="NIM" placeholder="Masukkan NIM" autofocus required
                value="<?php echo $mahaiswa["NIM"]; ?>">
            </div>
            <br>
            <div>
                <input type="text" name="nama" placeholder="Masukkan nama" required
                value="<?php echo $mahaiswa["nama"]; ?>">
            </div>
            <br>
            <div>
                <input type="text" name="jenis_kelamin" placeholder="Masukkan jenis_kelamin" required
                value="<?php echo $mahaiswa["jenis_kelamin"]; ?>">
            </div>
            <br>
            <div>
                <input type="text" name="tanggal_lahir" placeholder="Masukkan tanggal_lahir" required
                value="<?php echo $mahaiswa["tanggal_lahir"]; ?>">
            </div>
            <br>
            <div>
                <input type="text" name="alamat" placeholder="Masukkan alamat" required
                value="<?php echo $mahaiswa["alamat"]; ?>">
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

