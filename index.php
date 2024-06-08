<?php
// Mengimpor Koneksi dan Fungsi
require_once 'config/connect_db.php';
require_once 'session.php';
require_once 'function.php';

// Mengambil id_pengguna dari Sesi
$id_pengguna = $_SESSION["id_pengguna"];

// Mengambil Username dari Database
$username           = "SELECT username FROM tb_pengguna WHERE id_pengguna = '$id_pengguna'";
$result  = mysqli_query($conn, $username);
$row = mysqli_fetch_assoc($result);


// Ambil data dari tabel tb_mahasiswa / query data tb_mahasiswa
$result1 = query1("SELECT * FROM tb_mahasiswa");

// Menunjukkan error
if (!$result1) {
    echo mysqli_error($conn);
}

// Ambil data dari tabel tb_matakuliah / query data tb_matakuliah
$result2 = query2("SELECT * FROM tb_matakuliah");   

// Menunjukkan error
if (!$result2) {
    echo mysqli_error($conn);
}

// Ambil data dari tabel tb_nilai / query data tb_nilai
$result3 = query3("SELECT * FROM tb_nilai");

// Menunjukkan error
if (!$result3) {
    echo mysqli_error($conn);
}

// LOGOUT DARI AKUN
// Memeriksa apakah tombol logout diklik.
// Jika ya, menghapus semua data sesi dengan mengosongkan variabel $_SESSION, memanggil session_unset(), dan session_destroy().
// Mengarahkan pengguna ke halaman login.php.
if (isset($_POST['logout'])) {
    $_SESSION = [];
    session_unset();
    session_destroy();

    header('Location: login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <!-- File css -->
    <link rel="stylesheet" href="style/index.css">

    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<body class="poppins-regular">
    <nav>
        <h1>Manajemen Data Mahasiswa - TZM</h1>
        <!-- <a href="Tabel_Mahasiswa/page_mahasiswa.php">Mahasiwa</a>
        <a href="Tabel_Matakuliah/page_matakuliah.php">Matakuliah</a>
        <a href="Tabel_Nilai/page_nilai.php">Nilai</a> -->
        <div class="Tabel_Mahasiswa" onclick="setPageMahasiswa()">Mahasiwa</div>
        <div class="Tabel_Matakuliah" onclick="setPageMatakuliah()">Matakuliah</div>
        <div class="Tabel_Nilai" onclick="setPageNilai()">Nilai</div>
        <div class="profile" onclick="showProfile()">
            <i class="fa-solid fa-user"></i>
            <h1><?= $row['username'] ?></h1>
        </div>
    </nav>

    <div id="profile" style="display: none">
        <div class="icon">
            <div class="icon-close" onclick="closeProfile()">
                <i class="fa-solid fa-xmark"></i>
            </div>
        </div>
        <form action="" method="post">
            <button name="logout">
                <div class="icon-logout">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                </div>
                <h4>Logout dari akun</h4>
            </button>
        </form>
    </div>

    <main>
        <div class="container">

            <!-- HALAMAN DATA MAHASISWA (GRAFIK) -->
            <div id="page-data-mahasiswa">
                <h1>Data Mahasiswa</h1>
                <canvas id="myChart" width="1200" height="599"></canvas>
            </div>

            <!-- HALAMAN MAHASISWA -->
            <div id="page-mahasiswa" style="display: none">
                <div class="title">
                    <h1>Daftar Mahasiswa</h1>
                    <!-- <a href="../index.php">Kembali</a> -->
                    <div class="back" onclick="setPageDataMahasiswa()">Kembali</div>
                </div>

                <br>
                <div class="tambah-search">
                    <a href="Tabel_Mahasiswa/tambah.php"><i class="fa-solid fa-plus"></i><p>Tambah</p></a>
                    <input type="text" placeholder="Search" id="search-mahasiswa"/>
                </div>
                <br>

                <table border="1" cellpadding="10" cellspacing="0" id="daftar-mahasiswa">
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>nama</th>
                        <th>jenis_kelamin</th>
                        <th>tanggal_lahir</th>
                        <th>alamat</th>
                        <th>aksi</th>
                    </tr>

                    <?php $no = 1;?>
                    <?php foreach ($result1 as $tb_mahasiswa): ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $tb_mahasiswa["NIM"]; ?></td>
                        <td><?php echo $tb_mahasiswa["nama"]; ?></td>
                        <td><?php echo $tb_mahasiswa["jenis_kelamin"]; ?></td>
                        <td><?php echo $tb_mahasiswa["tanggal_lahir"]; ?></td>
                        <td><?php echo $tb_mahasiswa["alamat"]; ?></td>
                        
                        <td class="aksi">
                            <!-- Mengirimkan data yaitu id melalui URL ($_GET)
                                Menggunakan fungsi "confirm()" pada js untuk meminta konfirmasi pada user
                            -->
                            <a href="Tabel_Mahasiswa/ubah.php?NIM=<?php echo $tb_mahasiswa["NIM"]; ?>" ><i class="fa-solid fa-pen-to-square"></i></a>

                            <a href="Tabel_Mahasiswa/hapus.php?NIM=<?php echo $tb_mahasiswa["NIM"]; ?>"
                            onclick="return confirm('Yakin?')"><i class="fa-regular fa-trash-can"></i></a>
                        </td>
                    </tr>
                    <?php $no++;?>
                    <?php endforeach;?>

                </table>
            </div>

            <!-- HALAMAN MATAKULIAH -->
            <div id="page-matakuliah" style="display: none">
                <div class="title">
                    <h1>Daftar Matakuliah</h1>
                    <div class="back" onclick="setPageDataMahasiswa()">Kembali</div>
                </div>

                <br>
                <div class="tambah-search">
                    <a href="Tabel_Matakuliah/tambah.php"><i class="fa-solid fa-plus"></i><p>Tambah</p></a>
                    <input type="text" placeholder="Search" id="search-matakuliah"/>
                </div>
                <br>

                <table border="1" cellpadding="10" cellspacing="0" id="daftar-matakuliah">
                    <tr>
                        <th>No</th>
                        <th>kode_matkul</th>
                        <th>nama_matkul</th>
                        <th>sks</th>
                        <th>aksi</th>
                    </tr>

                    <?php $no = 1;?>
                    <?php foreach ($result2 as $tb_matakuliah): ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $tb_matakuliah["kode_matkul"]; ?></td>
                        <td><?php echo $tb_matakuliah["nama_matkul"]; ?></td>
                        <td><?php echo $tb_matakuliah["sks"]; ?></td>
                        
                        <td class="aksi">
                            <!-- Mengirimkan data yaitu id melalui URL ($_GET)
                                Menggunakan fungsi "confirm()" pada js untuk meminta konfirmasi pada user
                            -->
                            <a href="Tabel_Matakuliah/ubah.php?kode_matkul=<?php echo $tb_matakuliah["kode_matkul"]; ?>" ><i class="fa-solid fa-pen-to-square"></i></a>

                            <a href="Tabel_Matakuliah/hapus.php?kode_matkul=<?php echo $tb_matakuliah["kode_matkul"]; ?>"
                            onclick="return confirm('Yakin?')"><i class="fa-regular fa-trash-can"></i></a>
                        </td>
                    </tr>
                    <?php $no++;?>
                    <?php endforeach;?>

                </table>
            </div>

            <!-- HALAMAN NILAI -->
            <div id="page-nilai" style="display: none">
                <div class="title">
                    <h1>Daftar Nilai</h1>
                    <div class="back" onclick="setPageDataMahasiswa()">Kembali</div>
                </div>

                <br>
                <div class="tambah-search">
                    <a href="Tabel_Nilai/tambah.php"><i class="fa-solid fa-plus"></i><p>Tambah</p></a>
                    <input type="text" placeholder="Search" id="search-nilai"/>
                </div>
                <br>

                <table border="1" cellpadding="10" cellspacing="0" id="daftar-nilai">
                    <tr>
                        <th>No</th>
                        <th>id_nilai</th>
                        <th>NIM</th>
                        <th>kode_matkul</th>
                        <th>nilai</th>
                        <th>aksi</th>
                    </tr>

                    <?php $no = 1;?>
                    <?php foreach ($result3 as $tb_nilai): ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $tb_nilai["id_nilai"]; ?></td>
                        <td><?php echo $tb_nilai["NIM"]; ?></td>
                        <td><?php echo $tb_nilai["kode_matkul"]; ?></td>
                        <td><?php echo $tb_nilai["nilai"]; ?></td>
                        
                        <td class="aksi">
                            <!-- Mengirimkan data yaitu id melalui URL ($_GET)
                                Menggunakan fungsi "confirm()" pada js untuk meminta konfirmasi pada user
                            -->
                            <a href="Tabel_Nilai/ubah.php?id_nilai=<?php echo $tb_nilai["id_nilai"]; ?>" ><i class="fa-solid fa-pen-to-square"></i></a>

                            <a href="Tabel_Nilai/hapus.php?id_nilai=<?php echo $tb_nilai["id_nilai"]; ?>"
                            onclick="return confirm('Yakin?')"><i class="fa-regular fa-trash-can"></i></a>
                        </td>
                    </tr>
                    <?php $no++;?>
                    <?php endforeach;?>

                </table>
            </div>

        </div>
    </main>

    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [], // Label calon akan diisi dari data yang didapatkan melalui AJAX
                datasets: [{
                    // label: 'Nilai Mahasiswa',
                    label: 'nilai',
                    data: [], // Data nilai akan diisi dari data yang didapatkan melalui AJAX
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        document.addEventListener("DOMContentLoaded", function() {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var hasil = JSON.parse(xhr.responseText); // Parsing JSON response dari server.
                var labels = [];
                var nilai = [];
                for (var key in hasil) {
                    labels.push(hasil[key]['nama'] + ', ' + hasil[key]['nama_matkul']); // Menambahkan label dengan format 'nama, nama_matkul'.
                    nilai.push(hasil[key]['nilai']); // Menambahkan nilai ke array 'nilai'.
                }

                myChart.data.labels = labels; // Mengupdate labels chart.
                myChart.data.datasets[0].data = nilai; // Mengupdate data chart.
                myChart.update(); // Memperbarui chart dengan data baru.
            } else {
                console.error('AJAX request failed with status ' + xhr.status); // Menampilkan error jika permintaan gagal.
            }
        };
        xhr.open("GET", "ajax/koneksi.php", true); // Menyiapkan permintaan GET.
        xhr.send(); // Mengirim permintaan ke server.
    });

    

    function showProfile() {
        let profile = document.getElementById('profile');
        profile.style.display = 'block';
    }

    function closeProfile() {
        let profile = document.getElementById('profile');
        profile.style.display = 'none';
    }


    function setPageDataMahasiswa() {
        let pageDataMahasiswa   = document.getElementById('page-data-mahasiswa');
        let pageMahasiswa       = document.getElementById('page-mahasiswa');
        let pageMatakuliah      = document.getElementById('page-matakuliah');
        let pageNilai           = document.getElementById('page-nilai');

        pageDataMahasiswa.style.display = 'block';
        pageMahasiswa.style.display     = 'none';
        pageMatakuliah.style.display    = 'none';
        pageNilai.style.display         = 'none';

    }

    function setPageMahasiswa() {
        let pageDataMahasiswa   = document.getElementById('page-data-mahasiswa');
        let pageMahasiswa       = document.getElementById('page-mahasiswa');
        let pageMatakuliah      = document.getElementById('page-matakuliah');
        let pageNilai           = document.getElementById('page-nilai');

        pageDataMahasiswa.style.display = 'none';
        pageMahasiswa.style.display     = 'block';
        pageMatakuliah.style.display    = 'none';
        pageNilai.style.display         = 'none';

    }

    function setPageMatakuliah() {
        let pageDataMahasiswa   = document.getElementById('page-data-mahasiswa');
        let pageMahasiswa       = document.getElementById('page-mahasiswa');
        let pageMatakuliah      = document.getElementById('page-matakuliah');
        let pageNilai           = document.getElementById('page-nilai');

        pageDataMahasiswa.style.display = 'none';
        pageMahasiswa.style.display     = 'none';
        pageMatakuliah.style.display    = 'block';
        pageNilai.style.display         = 'none';

    }

    function setPageNilai() {
        let pageDataMahasiswa   = document.getElementById('page-data-mahasiswa');
        let pageMahasiswa       = document.getElementById('page-mahasiswa');
        let pageMatakuliah      = document.getElementById('page-matakuliah');
        let pageNilai           = document.getElementById('page-nilai');

        pageDataMahasiswa.style.display = 'none';
        pageMahasiswa.style.display     = 'none';
        pageMatakuliah.style.display    = 'none';
        pageNilai.style.display         = 'block';

    }

    </script>

    <!-- FILE JS -->
    <script src="js/script.js"></script>
    
</body>
</html>