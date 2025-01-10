<?php
    include "service/database.php";
    session_start();

    $register_message = "";
    
    if(isset($_SESSION["is_login"])) {
        header("location: dashboard.php");
    }

    if (isset($_POST["register"])){
        $Fullname = $_POST["Full_name"];
        $Email = $_POST["Email"];
        $Password = $_POST["Password"];

        try {
            $sql = "INSERT INTO users (Full_name, Email, Password) VALUES
            ('$Fullname', '$Email' '$Password')";
    
            if ($db->query($sql)) {
                $register_message = "Daftar akun berhasil, silakan login";
            } else {
                $register_message = "Daftar akun gagal, silakan coba lagi";
            }
        } catch (mysqli_sql_exception) {
            $register_message = "Email sudah ada, silakan ganti email yang lain";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Pengguna</title>
    <link rel="stylesheet" href="anis.css">
    <script src="register.js" defer></script>
</head>
<body>
    <div class="form-container">
        <h1>Daftar Akun</h1>
        <form id="registerForm" method="POST" action="register.php">
            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input type="text" id="name" name="name" placeholder="Masukkan nama anda" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Masukkan email anda" required>
                <small class="error-message" id="emailError"></small>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Masukkan password" required>
                <small>Password minimal 6 karakter.</small>
            </div>

            <div class="form-group">
                <label for="confirmPassword">Konfirmasi Password</label>
                <input type="password" id="confirmPassword" placeholder="Masukkan ulang password" required>
                <small class="error-message" id="passwordError"></small>
            </div>

            <button type="submit">Daftar</button>
        </form>

        <p>sudah punya aku? <a href="login.html">Login di sini</a></p>
    </div>
</body>
</html>
