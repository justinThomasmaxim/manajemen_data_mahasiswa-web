<?php

require_once '../config/connect_db.php';
require_once '../function.php';

// data didapatkan dari ajax yang dikirimkan dengan method GET
$search = $_GET['search'];

$query = "SELECT * FROM tb_nilai
            WHERE
            id_nilai    LIKE '%$search%' OR
            NIM         LIKE '%$search%' OR
            kode_matkul LIKE '%$search%' OR
            nilai       LIKE '%$search%'
            ";

$daftar_nilai = query3($query);

?>


<tr>
    <th>No</th>
    <th>id_nilai</th>
    <th>NIM</th>
    <th>kode_matkul</th>
    <th>nilai</th>
    <th>aksi</th>
</tr>

<?php $no = 1;?>
<?php foreach ($daftar_nilai as $nilai): ?>
<tr>
    <td><?php echo $no; ?></td>
    <td><?php echo $nilai["id_nilai"]; ?></td>
    <td><?php echo $nilai["NIM"]; ?></td>
    <td><?php echo $nilai["kode_matkul"]; ?></td>
    <td><?php echo $nilai["nilai"]; ?></td>
    
    <td class="aksi">
        <!-- Mengirimkan data yaitu id melalui URL ($_GET)
            Menggunakan fungsi "confirm()" pada js untuk meminta konfirmasi pada user
        -->
        <a href="Tabel_Nilai/ubah.php?id_nilai=<?php echo $nilai["id_nilai"]; ?>" ><i class="fa-solid fa-pen-to-square"></i></a>

        <a href="Tabel_Nilai/hapus.php?id_nilai=<?php echo $nilai["id_nilai"]; ?>"
        onclick="return confirm('Yakin?')"><i class="fa-regular fa-trash-can"></i></a>
    </td>
</tr>
<?php $no++;?>
<?php endforeach;?>


