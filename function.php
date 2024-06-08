<?php 

// - - - - - ( SIGN IN ) - - - - -
function registrasi($data)
{
    global $conn;

    $username = $data["username"];
    $email = $data["email"];
    $password = $data["password"];

    // cek username sudah ada atau belum
    $query = "SELECT username FROM tb_pengguna WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0) {

        // if (mysqli_fetch_assoc($result)) {
            echo "<script>
                    alert('Username sudah terdaftar!')
                 </script>";
            return false;
        // }
    
    } 

    // insert data ke database
    $query1 = "INSERT INTO tb_pengguna (username, password, email) VALUES ('$username', '$password', '$email')";


    mysqli_query($conn, $query1);

    return mysqli_affected_rows($conn);
}


// - - - - - ( FUNCTION UNTUK DAFTAR MAHASISWA ) - - - - -
function query1($query) {
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

function tambah1($data) {

    global $conn;

    // ambil data dari tiap elemen dalam form
    $id_pengguna   = $data["id_pengguna"];
    $NIM           = htmlspecialchars($data["NIM"]);
    $nama          = htmlspecialchars($data["nama"]);
    $jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
    $tanggal_lahir = htmlspecialchars($data["tanggal_lahir"]);
    $alamat        = htmlspecialchars($data["alamat"]);

    // Query insert data
   

    $query = "INSERT INTO tb_mahasiswa(NIM, nama, jenis_kelamin, tanggal_lahir, alamat, id_pengguna)
    VALUES ('$NIM', '$nama', '$jenis_kelamin', '$tanggal_lahir', '$alamat', '$id_pengguna')";

    mysqli_query($conn, $query);

    // Jika gagal mengembalikan nilai -1, 
    // jika berhasil mengembalikan nilai 1
    return mysqli_affected_rows($conn);
}

function hapus1($NIM) {
    global $conn;

    mysqli_query($conn, "DELETE FROM tb_mahasiswa WHERE NIM = '$NIM'");
    
    // Jika gagal mengembalikan nilai -1, 
    // jika berhasil mengembalikan nilai 1
    return  mysqli_affected_rows($conn);

}

function ubah1($data) {

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


// - - - - - ( FUNCTION UNTUK DAFTAR MATAKULIAH ) - - - - -
function query2($query) {
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

function tambah2($data) {

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

function hapus2($kode_matkul) {
    global $conn;

    mysqli_query($conn, "DELETE FROM tb_matakuliah WHERE kode_matkul = '$kode_matkul'");
    
    // Jika gagal mengembalikan nilai -1, 
    // jika berhasil mengembalikan nilai 1
    return  mysqli_affected_rows($conn);

}

function ubah2($data) {

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


// - - - - - ( FUNCTION UNTUK DAFTAR NILAI ) - - - - -
function query3($query) {
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

function tambah3($data) {

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

function hapus3($id_nilai) {
    global $conn;

    mysqli_query($conn, "DELETE FROM tb_nilai WHERE id_nilai = '$id_nilai'");
    
    // Jika gagal mengembalikan nilai -1, 
    // jika berhasil mengembalikan nilai 1
    return  mysqli_affected_rows($conn);

}

function ubah3($data) {

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