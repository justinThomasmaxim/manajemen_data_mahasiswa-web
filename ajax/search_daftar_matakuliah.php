<?php

require_once '../config/connect_db.php';
require_once '../function.php';

// data didapatkan dari ajax yang dikirimkan dengan method GET
$search = $_GET['search'];

$query = "SELECT * FROM tb_matakuliah
            WHERE
            kode_matkul LIKE '%$search%' OR
            nama_matkul LIKE '%$search%' OR
            sks         LIKE '%$search%' 
            ";

$daftar_matakuliah = query2($query);

?>


<tr>
    <th>No</th>
    <th>kode_matkul</th>
    <th>nama_matkul</th>
    <th>sks</th>
    <th>aksi</th>
</tr>

<?php $no = 1;?>
<?php foreach ($daftar_matakuliah as $matakuliah): ?>
<tr>
    <td><?php echo $no; ?></td>
    <td><?php echo $matakuliah["kode_matkul"]; ?></td>
    <td><?php echo $matakuliah["nama_matkul"]; ?></td>
    <td><?php echo $matakuliah["sks"]; ?></td>
    
    <td class="aksi">
        <!-- Mengirimkan data yaitu id melalui URL ($_GET)
            Menggunakan fungsi "confirm()" pada js untuk meminta konfirmasi pada user
        -->
        <a href="Tabel_Matakuliah/ubah.php?kode_matkul=<?php echo $matakuliah["kode_matkul"]; ?>" ><i class="fa-solid fa-pen-to-square"></i></a>

        <a href="Tabel_Matakuliah/hapus.php?kode_matkul=<?php echo $matakuliah["kode_matkul"]; ?>"
        onclick="return confirm('Yakin?')"><i class="fa-regular fa-trash-can"></i></a>
    </td>
</tr>
<?php $no++;?>
<?php endforeach;?>


