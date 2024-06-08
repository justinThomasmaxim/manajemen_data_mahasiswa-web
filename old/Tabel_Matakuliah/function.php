<?php 

require '../config/connect_db.php';

function query($query) {
    // Dengan keyworld global mengacu ke variabel conn diatas 
    // bukan variabel baru conn
    global $conn;

    $result = mysqli_query($conn, $query);
    $simpan = [];
    while( $matakuliah = mysqli_fetch_assoc($result) ) {
        $simpan[] = $matakuliah;
    }
    return $simpan;

}

function tambah($data) {

    global $conn;

    // ambil data dari tiap elemen dalam form
    $kode_matkul = htmlspecialchars($data["kode_matkul"]);
    $nama_matkul = htmlspecialchars($data["nama_matkul"]);
    $sks         = htmlspecialchars($data["sks"]);

    // Query insert data
   

    $query = "INSERT INTO tb_matakuliah(kode_matkul, nama_matkul, sks)
    VALUES ('$kode_matkul', '$nama_matkul', '$sks')";

    mysqli_query($conn, $query);

    // Jika gagal mengembalikan nilai -1, 
    // jika berhasil mengembalikan nilai 1
    return  mysqli_affected_rows($conn);
}

function hapus($kode_matkul) {
    global $conn;

    mysqli_query($conn, "DELETE FROM tb_matakuliah WHERE kode_matkul = '$kode_matkul'");
    
    // Jika gagal mengembalikan nilai -1, 
    // jika berhasil mengembalikan nilai 1
    return  mysqli_affected_rows($conn);

}

function ubah($data) {

    global $conn;

    // ambil data dari tiap elemen dalam form
    $kode_matkul = htmlspecialchars($data["kode_matkul"]);
    $nama_matkul = htmlspecialchars($data["nama_matkul"]);
    $sks         = htmlspecialchars($data["sks"]);

    
    $query = "UPDATE tb_matakuliah SET
                kode_matkul = '$kode_matkul',
                nama_matkul = '$nama_matkul', 
                sks         = '$sks'
            WHERE kode_matkul = '$kode_matkul'
        ";

    mysqli_query($conn, $query);

    // Jika gagal mengembalikan nilai -1, 
    // jika berhasil mengembalikan nilai 1
    return  mysqli_affected_rows($conn);
}


?>