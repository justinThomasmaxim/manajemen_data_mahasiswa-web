<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link rel="stylesheet" href="style/index.css">

    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">

    <!-- Chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<body class="poppins-regular">
    <nav>
        <h1>Manajemen Data Mahasiswa - TZM</h1>
        <a href="Tabel_Mahasiswa/page_mahasiswa.php">Mahasiwa</a>
        <a href="Tabel_Matakuliah/page_matakuliah.php">Matakuliah</a>
        <a href="Tabel_Nilai/page_nilai.php">Nilai</a>
    </nav>

    <main>
        <div class="container">
            <h1>Data Mahasiswa</h1>
            <canvas id="myChart" width="1200" height="599"></canvas>
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
                var hasil      = JSON.parse(xhr.responseText);
                    var labels     = [];
                    var nilai      = [];
                    for (var key in hasil) {
                        labels.push(hasil[key]['nama']);
                        nilai.push(hasil[key]['nilai']);
                    }

                    myChart.data.labels = labels;
                    myChart.data.datasets[0].data = nilai;
                    myChart.update();
            } else {
                    console.error('AJAX request failed with status ' + xhr.status);
                }
        };
        xhr.open("GET", "ajax/koneksi.php", true);
        xhr.send();
    });
    </script>
    
</body>
</html>