<?php
<<<<<<< HEAD
include "database.php";
session_start();

$register_message = "";

if (isset($_SESSION["is_login"])) {
    header("location: dashboard.php");
    exit();
}

if (isset($_POST["register"])) {
    $Fullname = $_POST["Full_name"];
    $Email = $_POST["Email"];
    $Password = $_POST["Password"];

    // Hash password
    $hashedPassword = password_hash($Password, PASSWORD_DEFAULT);

    try {
        $sql = "INSERT INTO users (Full_name, Email, Password) VALUES (?, ?, ?)";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("sss", $Fullname, $Email, $hashedPassword);

        if ($stmt->execute()) {
            $register_message = "Daftar akun berhasil, silakan login";
        } else {
            $register_message = "Daftar akun gagal, silakan coba lagi";
        }
    } catch (mysqli_sql_exception $e) {
        $register_message = "Email sudah ada, silakan ganti email yang lain";
    }
=======
include('koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    if ($password !== $confirmPassword) {
        echo "Password dan konfirmasi password tidak cocok!";
        exit();
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $db->prepare("SELECT * FROM login_register WHERE email = ?");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Email sudah terdaftar!";
        exit();
    }

    $stmt = $db->prepare("INSERT INTO login_register (email, password) VALUES (?, ?)");
    $stmt->bind_param('ss', $email, $hashed_password);

    if ($stmt->execute()) {
        echo "Registrasi berhasil! Silakan <a href='login.php'>Login</a>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
>>>>>>> bb7fc2105db8ed187afdce9697d3d9bd80d697ff
}
?>

<!DOCTYPE html>
<html lang="en">
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
            height: 100vh;
        }
        .form-container {
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
        }
        h1 {
            margin-bottom: 1rem;
            text-align: center;
            color: #333;
        }
        .form-group {
            margin-bottom: 1rem;
        }
        label {
            display: block;
            margin-bottom: 0.5rem;
            color: #555;
        }
        input {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
        }
        button {
            width: 100%;
            padding: 0.8rem;
            border: none;
            background-color: #f5a623;
            color: white;
            font-size: 1rem;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #e59420;
        }
        p {
            text-align: center;
            margin-top: 1rem;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Daftar Akun</h1>
<<<<<<< HEAD
        <?php if ($register_message): ?>
            <p><?php echo $register_message; ?></p>
        <?php endif; ?>
        <form id="registerForm" method="POST" action="register.php">
            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input type="text" id="name" name="Full_name" placeholder="Masukkan nama anda" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="Email" placeholder="Masukkan email anda" required>
                <small class="error-message" id="emailError"></small>
=======
        <form method="POST" action="register.php">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Masukkan email anda" required>
>>>>>>> bb7fc2105db8ed187afdce9697d3d9bd80d697ff
            </div>
            <div class="form-group">
                <label for="password">Password</label>
<<<<<<< HEAD
                <input type="password" id="password" name="Password" placeholder="Masukkan password" required>
                <small>Password minimal 6 karakter.</small>
=======
                <input type="password" id="password" name="password" placeholder="Masukkan password" required>
>>>>>>> bb7fc2105db8ed187afdce9697d3d9bd80d697ff
            </div>
            <div class="form-group">
                <label for="confirmPassword">Konfirmasi Password</label>
                <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Masukkan ulang password" required>
            </div>
<<<<<<< HEAD

            <button type="submit" name="register">Daftar</button>
        </form>

        <p>sudah punya akun? <a href="login.html">Login di sini</a></p>
=======
            <button type="submit">Daftar</button>
        </form>
        <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
>>>>>>> bb7fc2105db8ed187afdce9697d3d9bd80d697ff
    </div>
</body>
</html>