<?php
session_start();
include('koneksi.php'); // Pastikan koneksi database sudah benar

$error_message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Cek apakah login untuk admin menggunakan email dan password khusus
    if ($email === 'kesarinacake@gmail.com' && $password === 'admin123') {
        $_SESSION['user_id'] = 0;  // ID admin, bisa diatur sesuai kebutuhan
        $_SESSION['email'] = $email;
        header("Location: admin_produk.php");  // Redirect ke halaman admin
        exit();
    }

    // Jika bukan admin, periksa email di database
    $stmt = $db->prepare("SELECT * FROM login_register WHERE email = ?");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            header("Location: index.php");  // Redirect ke halaman utama pengguna
            exit();
        } else {
            $error_message = "Password salah!";
        }
    } else {
        $error_message = "Email tidak ditemukan!";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Pengguna</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        
        .form-container {
            background: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
        }

        h1 {
            margin-bottom: 15px;
            text-align: center;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #555;
        }

        input {
            width: 100%;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 20px;
        }

        button {
            width: 100%;
            padding: 15px;
            border: none;
            background-color: #ad2020;
            color: white;
            font-size: 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #ad2020;
        }

        .error-message {
            color: red;
            font-size: 18px;
        }

        p {
            text-align: center;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Login</h1>
        <form method="POST" action="login.php" autocomplete="off">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Masukkan email anda" required autocomplete="off">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Masukkan password" required autocomplete="off">
            </div>
            <button type="submit">Login</button>
        </form>


        <p>Belum punya akun? <a href="register.php">Daftar di sini</a></p>
        <p class="error-message"><?php echo $error_message; ?></p>
    </div>
</body>
</html>
