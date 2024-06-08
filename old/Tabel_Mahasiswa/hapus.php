<?php 
include 'function.php';

$NIM = $_GET["NIM"];

// cek apakah data berhasil dihapus atau tidak
if( hapus($NIM) > 0) {
    echo "
        <script> 
            alert('Data berhasil dihapus');
            document.location.href = 'page_mahasiswa.php';
        </script>
    ";
} else {
    echo "
        <script> 
            alert('Data gagal dihapus');
            document.location.href = 'page_mahasiswa.php';
        </script>
    ";

}



?>

