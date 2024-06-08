<?php 
require '../config/connect_db.php';
require '../function.php';

$id_nilai = $_GET["id_nilai"];

// cek apakah data berhasil dihapus atau tidak
if( hapus3($id_nilai) > 0) {
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

