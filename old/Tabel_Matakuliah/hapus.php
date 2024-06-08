<?php 
include 'function.php';

$kode_matkul = $_GET["kode_matkul"];

// cek apakah data berhasil dihapus atau tidak
if( hapus($kode_matkul) > 0) {
    echo "
        <script> 
            alert('Data berhasil dihapus');
            document.location.href = 'page_matakuliah.php';
        </script>
    ";
} else {
    echo "
        <script> 
            alert('Data gagal dihapus');
            document.location.href = 'page_matakuliah.php';
        </script>
    ";

}



?>

