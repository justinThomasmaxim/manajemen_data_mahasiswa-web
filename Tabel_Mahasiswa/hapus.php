<?php 
require '../config/connect_db.php';
require '../function.php';

$NIM = $_GET["NIM"];

// cek apakah data berhasil dihapus atau tidak
if( hapus1($NIM) > 0) {
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

