<?php 

// require '../config/connect_db.php';

function query($query) {
    // Dengan keyworld global mengacu ke variabel conn diatas 
    // bukan variabel baru conn
    global $conn;

    $result = mysqli_query($conn, $query);
    $simpan = [];
    while( $mahasiswa = mysqli_fetch_assoc($result) ) {
        $simpan[] = $mahasiswa;
    }
    return $simpan;

}

function tambah($data) {

    global $conn;

    // ambil data dari tiap elemen dalam form
    $NIM           = htmlspecialchars($data["NIM"]);
    $nama          = htmlspecialchars($data["nama"]);
    $jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
    $tanggal_lahir = htmlspecialchars($data["tanggal_lahir"]);
    $alamat        = htmlspecialchars($data["alamat"]);

    // Query insert data
   

    $query = "INSERT INTO tb_mahasiswa(NIM, nama, jenis_kelamin, tanggal_lahir, alamat)
    VALUES ('$NIM', '$nama', '$jenis_kelamin', '$tanggal_lahir', '$alamat')";

    mysqli_query($conn, $query);

    // Jika gagal mengembalikan nilai -1, 
    // jika berhasil mengembalikan nilai 1
    return  mysqli_affected_rows($conn);
}

function hapus($NIM) {
    global $conn;

    mysqli_query($conn, "DELETE FROM tb_mahasiswa WHERE NIM = '$NIM'");
    
    // Jika gagal mengembalikan nilai -1, 
    // jika berhasil mengembalikan nilai 1
    return  mysqli_affected_rows($conn);

}

function ubah($data) {

    global $conn;

    // ambil data dari tiap elemen dalam form
    $NIM           = htmlspecialchars($data["NIM"]);
    $nama          = htmlspecialchars($data["nama"]);
    $jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
    $tanggal_lahir = htmlspecialchars($data["tanggal_lahir"]);
    $alamat        = htmlspecialchars($data["alamat"]);

    
    $query = "UPDATE tb_mahasiswa SET
                NIM           = '$NIM',
                nama          = '$nama', 
                jenis_kelamin = '$jenis_kelamin',
                tanggal_lahir = '$tanggal_lahir',
                alamat        = '$alamat'
            WHERE NIM = '$NIM'
        ";

    mysqli_query($conn, $query);

    // Jika gagal mengembalikan nilai -1, 
    // jika berhasil mengembalikan nilai 1
    return  mysqli_affected_rows($conn);
}


?>