<?php 
require '../config/connect_db.php';
require '../function.php';

$kode_matkul = $_GET["kode_matkul"];

// cek apakah data berhasil dihapus atau tidak
if( hapus2($kode_matkul) > 0) {
    echo "
        <script> 
            alert('Data berhasil dihapus');
            document.location.href = '../index.php';
        </script>
    ";
} else {
    echo "
        <script> 
            alert('Data gagal dihapus');
            document.location.href = '../index.php';
        </script>
    ";

}



?>

