<?php 

// Variabel $user dan $pass diinisialisasi dengan nilai false untuk melacak status validasi input username dan password.
$user = false;
$pass = false;

// Skrip connect_db.php diimpor untuk menghubungkan halaman ini dengan database.
require 'config/connect_db.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign in</title>

    <!-- File CSS -->
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
                <h1>SIGN IN</h1>
                <form method="post">
                    <!-- <label for="username">Username (Maksimal 7 Karakter):</label> -->
                    <input type="text" name="username" id="username" placeholder="Enter Your Username" autofocus
                        required>

                    <?php
                    // Jika form dikirimkan ($_SERVER["REQUEST_METHOD"] == "POST"), username diambil dari input dan disimpan di variabel $username.
                    // Variabel $user diset ke true untuk menunjukkan bahwa username diisi.
                    // Jika panjang username lebih dari 7 karakter, pesan error ditampilkan, dan $user diset ke false.

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $username = $_POST["username"];

                        $user = true;

                        if (strlen($username) > 7) {
                            echo "<p class='error-username'>*Username tidak boleh lebih dari tujuh karakter.</p>";
                            $user = false;
                        }
                    }

                    ?>

                    <br>
                    <input type="email" name="email" id="username" placeholder="Enter Your Email" autofocus required>

                    <br>
                    <!-- <label for="password">Password (Minimal 10 Karakter, Harus terdiri dari huruf kapital, huruf kecil, angka, dan karakter khusus):</label> -->
                    <input type="password" name="password" id="password" placeholder="Enter Your Password" required>
                    <!-- <input type="button" name="show" id="show" class="mt-1 mb-6 text-right cursor-pointer" value="Show"> -->

                    <div class="checkbox">
                        <input type="checkbox" id="show" value="Show">
                        <p>Show Password</p>
                    </div>
                    <?php

                    // Password diambil dari input dan disimpan di variabel $password.
                    // Validasi dilakukan untuk memastikan password memiliki huruf kapital, huruf kecil, angka, karakter khusus, dan minimal 10 karakter.
                    // Jika password tidak memenuhi salah satu syarat, pesan error ditampilkan, dan $pass diset ke false.
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $password = $_POST["password"];
                        $uppercase = preg_match('@[A-Z]@', $password);
                        $lowercase = preg_match('@[a-z]@', $password);
                        $number = preg_match('@[0-9]@', $password);
                        $specialChars = preg_match('@[^\/_,.w]@', $password);

                        $pass = true;

                        if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 10) {
                            echo "<p class='error-password'>*Password harus terdiri dari huruf kapital, huruf kecil, angka, dan karakter khusus serta memiliki minimal 10 karakter.</p>";
                            $pass = false;
                        }
                    }
                    ?>

                    <br>
                    <div class="button-link">
                        <button name="submit">Sign In</button>
                        <a href="login.php">Login</a>
                    </div>
                    <!-- <input type="submit" name="submit" value="LOGIN"> -->
                </form>
            </div>

            <?php 
    
            // Skrip function.php diimpor yang mungkin berisi fungsi-fungsi terkait registrasi.
            // Jika variabel $user dan $pass bernilai true, yang berarti username dan password valid, dan tombol submit diklik, maka fungsi registrasi dipanggil dengan parameter $_POST.
            // Jika registrasi berhasil (registrasi($_POST) > 0), pesan alert ditampilkan, dan pengguna diarahkan ke halaman login (login.php).
            require 'function.php';

            if($user == true && $pass == true) {
                if (isset($_POST["submit"])) {
                    if (registrasi($_POST) > 0) {
                        echo "<script>
                            alert('Sign Up Berhasil');
                            document.location.href = 'login.php';
                        </script>";
                    }
                }
            }
            
            ?>
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