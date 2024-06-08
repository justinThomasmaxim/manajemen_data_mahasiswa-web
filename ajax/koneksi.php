<?php

$hostname = "localhost";
$username = "root";
$password = "";
$db_name  = "db_mahasiswa";

$koneksi = mysqli_connect($hostname, $username, $password, $db_name);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
;

$query = "SELECT mhs.nama, mk.nama_matkul, n.nilai 
            FROM tb_nilai AS n
            INNER JOIN  tb_mahasiswa  AS mhs ON (n.NIM = mhs.NIM)
            INNER JOIN  tb_matakuliah AS mk  ON (n.kode_matkul = mk.kode_matkul);
        ";
$result = mysqli_query($koneksi, $query);

$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

echo json_encode($data);

mysqli_close($koneksi);
