<?php 
// Memulai sesi PHP, memungkinkan penggunaan variabel sesi untuk menyimpan informasi pengguna yang dapat diakses di halaman lain.
session_start();

// Menghubungkan ke Database
require 'config/connect_db.php';

// Memeriksa Jika Formulir Dikirimkan
if ( isset($_POST["submit"]) ) {
    // Mengambil dan Menyimpan Input Pengguna
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Menyiapkan query SQL untuk mencari pengguna dengan username dan password yang sesuai dalam tabel tb_pengguna.
    // Menjalankan query tersebut menggunakan mysqli_query dan menyimpan hasilnya dalam variabel $result.
    $query = "SELECT * FROM tb_pengguna WHERE username = '$username' AND password = '$password'";

    $result = mysqli_query($conn, $query);
 
    // Mengambil baris hasil query dalam bentuk array asosiatif dan menyimpannya dalam variabel $row.
    $row = mysqli_fetch_assoc($result);

    // Membandingkan input username dan password dengan data yang diambil dari database.
    // Jika cocok, menyimpan id_pengguna dalam variabel sesi $_SESSION["id_pengguna"].
    // Mengalihkan pengguna ke halaman index.php menggunakan header("Location: index.php") dan menghentikan eksekusi skrip dengan exit.
    // Jika tidak cocok, menampilkan pesan alert bahwa username atau password tidak terdaftar.
    if ($username == $row['username'] && $password == $row['password']) {
        $_SESSION["id_pengguna"] = $row['id_pengguna'];

        header("Location: index.php");
        exit;
    }  else {
        echo "<script>alert('Usename atau password tidak terdaftar!')</script>";
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>login</title>
    <link rel="stylesheet" href="style/login_sign_in.css">
</head>

<body>
    <div class="flex-body">
        <div class="kolom-logo">
            <img src="images/LOGO_T_FOR_THOMAS-removebg-preview.png" alt="">
            <h1>Universitas Teweh City</h1>
        </div>
        <div class="kolom-input">
            <div class="container">
                <h1>LOGIN</h1>
                <form method="post">
                    <!-- <label for="username">Username (Maksimal 7 Karakter):</label> -->
                    <input type="text" name="username" id="username" placeholder="Enter Your Username" autofocus
                        required>

                    <br>
                    <!-- <label for="password">Password (Minimal 10 Karakter, Harus terdiri dari huruf kapital, huruf kecil, angka, dan karakter khusus):</label> -->
                    <input type="password" name="password" id="password" placeholder="Enter Your Password" required>
                    <!-- <input type="button" name="show" id="show" class="mt-1 mb-6 text-right cursor-pointer" value="Show"> -->
                    <div class="checkbox">
                        <input type="checkbox" id="show" value="Show">
                        <p>Show Password</p>
                    </div>

                    <br>
                    <div class="button-link">
                        <button name="submit">LOGIN</button>
                        <a href="sign_in.php">Sign In</a>
                    </div>
                    <!-- <input type="submit" name="submit" value="LOGIN"> -->
                </form>
            </div>
        </div>
    </div>

    <script>
        const show = document.getElementById('show');
        const pass = document.getElementById('password');

        show.addEventListener('click', () => {
            if (show.value === "Show") {
                show.value = 'Hide';
                pass.setAttribute('type', 'text');
            } else {
                show.value = 'Show';
                pass.setAttribute('type', 'password');
            }
        })
    </script>

</body>

</html>