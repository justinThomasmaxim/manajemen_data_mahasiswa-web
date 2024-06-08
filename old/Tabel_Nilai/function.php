<?php 

require '../config/connect_db.php';

function query($query) {
    // Dengan keyworld global mengacu ke variabel conn diatas 
    // bukan variabel baru conn
    global $conn;

    $result = mysqli_query($conn, $query);
    $simpan = [];
    while( $nilai = mysqli_fetch_assoc($result) ) {
        $simpan[] = $nilai;
    }
    return $simpan;

}

function tambah($data) {

    global $conn;

    // ambil data dari tiap elemen dalam form
    $id_nilai    = htmlspecialchars($data["id_nilai"]);
    $NIM         = htmlspecialchars($data["NIM"]);
    $kode_matkul = htmlspecialchars($data["kode_matkul"]);
    $nilai       = htmlspecialchars($data["nilai"]);

    // Query insert data
   

    $query = "INSERT INTO tb_nilai(id_nilai, NIM, kode_matkul, nilai)
    VALUES ('$id_nilai', '$NIM', '$kode_matkul', '$nilai')";

    mysqli_query($conn, $query);

    // Jika gagal mengembalikan nilai -1, 
    // jika berhasil mengembalikan nilai 1
    return  mysqli_affected_rows($conn);
}

function hapus($id_nilai) {
    global $conn;

    mysqli_query($conn, "DELETE FROM tb_nilai WHERE id_nilai = '$id_nilai'");
    
    // Jika gagal mengembalikan nilai -1, 
    // jika berhasil mengembalikan nilai 1
    return  mysqli_affected_rows($conn);

}

function ubah($data) {

    global $conn;

    // ambil data dari tiap elemen dalam form
    $id_nilai    = htmlspecialchars($data["id_nilai"]);
    $NIM         = htmlspecialchars($data["NIM"]);
    $kode_matkul = htmlspecialchars($data["kode_matkul"]);
    $nilai       = htmlspecialchars($data["nilai"]);
    
    $query = "UPDATE tb_nilai SET
                id_nilai    = '$id_nilai',
                NIM         = '$NIM', 
                kode_matkul = '$kode_matkul',
                nilai       = '$nilai'
            WHERE id_nilai  = '$id_nilai'
        ";

    mysqli_query($conn, $query);

    // Jika gagal mengembalikan nilai -1, 
    // jika berhasil mengembalikan nilai 1
    return  mysqli_affected_rows($conn);
}


?>