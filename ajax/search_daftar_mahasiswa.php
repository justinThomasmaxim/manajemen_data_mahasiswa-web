<?php

require_once '../config/connect_db.php';
require_once '../function.php';

// data didapatkan dari ajax yang dikirimkan dengan method GET
$search = $_GET['search'];

$query = "SELECT * FROM tb_mahasiswa
            WHERE
            NIM             LIKE '%$search%' OR
            nama            LIKE '%$search%' OR
            jenis_kelamin   LIKE '%$search%' OR
            tanggal_lahir   LIKE '%$search%' OR
            alamat          LIKE '%$search%'
           
            ";

$daftar_mahasiswa = query1($query);

?>


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
<?php foreach ($daftar_mahasiswa as $mahasiswa): ?>
<tr>
    <td><?php echo $no; ?></td>
    <td><?php echo $mahasiswa["NIM"]; ?></td>
    <td><?php echo $mahasiswa["nama"]; ?></td>
    <td><?php echo $mahasiswa["jenis_kelamin"]; ?></td>
    <td><?php echo $mahasiswa["tanggal_lahir"]; ?></td>
    <td><?php echo $mahasiswa["alamat"]; ?></td>
    
    <td class="aksi">
        <!-- Mengirimkan data yaitu id melalui URL ($_GET)
            Menggunakan fungsi "confirm()" pada js untuk meminta konfirmasi pada user
        -->
        <a href="Tabel_Mahasiswa/ubah.php?NIM=<?php echo $mahasiswa["NIM"]; ?>" ><i class="fa-solid fa-pen-to-square"></i></a>

        <a href="Tabel_Mahasiswa/hapus.php?NIM=<?php echo $mahasiswa["NIM"]; ?>"
        onclick="return confirm('Yakin?')"><i class="fa-regular fa-trash-can"></i></a>
    </td>
</tr>
<?php $no++;?>
<?php endforeach;?>


