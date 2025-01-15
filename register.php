<?php
include('koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $role = $_POST['role'];  // Get the selected role (either 'user' or 'admin')

    if ($password !== $confirmPassword) {
        echo "Password dan konfirmasi password tidak cocok!";
        exit();
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $db->prepare("SELECT * FROM login_register WHERE email = ? OR username = ?");
    $stmt->bind_param('ss', $email, $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Email atau Username sudah terdaftar!";
        exit();
    }

    $stmt = $db->prepare("INSERT INTO login_register (username, email, password, role) VALUES (?, ?, ?, ?)");
    $stmt->bind_param('ssss', $username, $email, $hashed_password, $role);

    if ($stmt->execute()) {
        // Redirect based on role
        if ($role === 'admin') {
            header("Location: admin_produk.php");  // Redirect to admin page
        } else {
            header("Location: index.php");  // Redirect to regular user page
        }
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Pengguna</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }
        .form-container {
            background: white;
            padding: 50px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
        }
        h1 {
            margin-bottom: 25px;
            text-align: center;
            color: #333;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        input[type="text"], input[type="email"], input[type="password"], select {
            width: 100%;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 15px;
        }
        button {
            width: 100%;
            padding: 15px;
            border: none;
            background-color: #ad2020;
            color: white;
            font-size: 15px;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #ad2020;
        }
        p {
            text-align: center;
            margin-top: 20px;
        }

        /* Styling khusus untuk radio button */
        .role-selection {
            display: flex;
            justify-content: space-around;
            margin-bottom: 20px;
        }
        .role-selection label {
            font-size: 16px;
            color: #555;
            cursor: pointer;
            display: inline-block;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .role-selection input[type="radio"] {
            display: none;
        }
        .role-selection input[type="radio"]:checked + label {
            background-color: #ad2020;
            color: white;
        }
        .role-selection label:hover {
            background-color: #f1f1f1;
        }

        /* Styling untuk instruksi role */
        .role-instruction {
            font-size: 14px;
            color: #666;
            margin-bottom: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Daftar Akun</h1>
        <form method="POST" action="register.php">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Masukkan username" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Masukkan email anda" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Masukkan password" required>
            </div>
            <div class="form-group">
                <label for="confirmPassword">Konfirmasi Password</label>
                <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Masukkan ulang password" required>
            </div>
            
            <!-- Instruksi untuk memilih role -->
            <div class="form-group">
                <p class="role-instruction">
                    Pilih peran Anda: <strong>Pengguna Biasa</strong> jika Anda ingin menggunakan akun untuk keperluan pribadi, atau pilih <strong>Admin</strong> jika Anda ingin mengelola situs ini.
                </p>
            </div>
            
            <div class="form-group role-selection">
                <div>
                    <input type="radio" id="role_user" name="role" value="user" checked>
                    <label for="role_user">Pengguna Biasa</label>
                </div>
                <div>
                    <input type="radio" id="role_admin" name="role" value="admin">
                    <label for="role_admin">Admin</label>
                </div>
            </div>
            
            <button type="submit">Daftar</button>
        </form>
        <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
    </div>
</body>
</html>
