<?php
include 'function.php';

// Ambil data dari tabel tb_mahasiswa / query data tb_mahasiswa
$result = query("SELECT * FROM tb_mahasiswa");

// Menunjukkan error
if (!$result) {
    echo mysqli_error($conn);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Data Jabatan</title>

    <!-- File css -->
    <link rel="stylesheet" href="../style/style.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">

</head>
<body class="poppins-regular">
    <div class="container">

        <div class="title">
            <h1>Daftar Mahasiswa</h1>
            <a href="../index.php">Kembali</a>
        </div>

        <br>
        <a href="tambah.php"><i class="fa-solid fa-plus"></i><p>Tambah</p></a>
        <br>

        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>nama</th>
                <th>jenis_kelamin</th>
                <th>tanggal_lahir</th>
                <th>alamat</th>
                <th>aksi</th>
            </tr>

            <?php $no = 1;?>
            <?php foreach ($result as $tb_mahasiswa): ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $tb_mahasiswa["NIM"]; ?></td>
                <td><?php echo $tb_mahasiswa["nama"]; ?></td>
                <td><?php echo $tb_mahasiswa["jenis_kelamin"]; ?></td>
                <td><?php echo $tb_mahasiswa["tanggal_lahir"]; ?></td>
                <td><?php echo $tb_mahasiswa["alamat"]; ?></td>
                
                <td class="aksi">
                     <!-- Mengirimkan data yaitu id melalui URL ($_GET)
                        Menggunakan fungsi "confirm()" pada js untuk meminta konfirmasi pada user
                    -->
                    <a href="ubah.php?NIM=<?php echo $tb_mahasiswa["NIM"]; ?>" ><i class="fa-solid fa-pen-to-square"></i></a>

                    <a href="hapus.php?NIM=<?php echo $tb_mahasiswa["NIM"]; ?>"
                    onclick="return confirm('Yakin?')"><i class="fa-regular fa-trash-can"></i></a>
                </td>
            </tr>
            <?php $no++;?>
            <?php endforeach;?>

        </table>
    </div>
</body>
</html>

<?php
// Menutup koneski
mysqli_close($conn);
?>
