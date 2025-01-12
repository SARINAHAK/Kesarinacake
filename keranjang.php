<?php
require "service/keranjangdatabase.php"; // Menghubungkan ke database
session_start();

// Simulasi data checkout (bisa berasal dari form atau keranjang belanja)
$_SESSION['checkout'] = [
    ['nama' => 'Chocolate Cake', 'harga' => 100000],
    ['nama' => 'Strawberry Shortcake', 'harga' => 120000],
    ['nama' => 'Cheesecake', 'harga' => 110000]
];

// Mengambil data dari session
$checkoutItems = $_SESSION['checkout'];

// Menghitung total harga
$totalHarga = 0;
foreach ($checkoutItems as $item) {
    $totalHarga += $item['harga'];
}

// Proses form jika tombol checkout ditekan
if (isset($_POST['checkout'])) {
    $username = $_POST['nama'];
    $nomor = $_POST['nomor'];
    $alamat = $_POST['alamat'];

    // Menyimpan ke database menggunakan prepared statement
    $stmt = $db->prepare("INSERT INTO keranjang (username, nomor, alamat, total_harga) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $username, $nomor, $alamat, $totalHarga);

    if ($stmt->execute()) {
        $checkout_message = "Pemesanan berhasil! Anda akan segera dihubungi oleh tim kami.";
        unset($_SESSION['checkout']); // Mengosongkan session checkout setelah berhasil
    } else {
        $checkout_message = "Proses pemesanan gagal. Silakan coba lagi.";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Kesarina Cake Shop</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #fdf5e6;
            text-align: center;
        }

        h1 {
            color: #8b4513;
        }

        table {
            width: 60%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #d2691e;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #d2691e;
            color: white;
        }

        .total {
            font-weight: bold;
            color: #d2691e;
        }

        .button {
            display: inline-block;
            margin: 20px auto;
            padding: 10px 20px;
            font-size: 18px;
            color: white;
            background-color: #d2691e;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }

        .button:hover {
            background-color: #a0522d;
        }
    </style>
</head>
<body>
    <?php include "layout/header.html"; ?>

    <h1>Hasil Checkout</h1>

    <table>
        <tr>
            <th>Nama Menu</th>
            <th>Harga</th>
        </tr>
        <?php foreach ($checkoutItems as $item): ?>
            <tr>
                <td><?php echo $item['nama']; ?></td>
                <td>Rp <?php echo number_format($item['harga'], 0, ',', '.'); ?></td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td class="total">Total Harga</td>
            <td class="total">Rp <?php echo number_format($totalHarga, 0, ',', '.'); ?></td>
        </tr>
    </table>

    <p>Terima kasih telah berbelanja di Kesarina Cake Shop!</p>

    <!-- Form Checkout -->
    <h3>Isi Data Anda untuk Checkout</h3>
    <form action="" method="POST">
        <input type="text" name="nama" placeholder="Nama" required>
        <input type="text" name="nomor" placeholder="Nomor Telepon" required>
        <textarea name="alamat" placeholder="Alamat Lengkap" required></textarea>
        <button type="submit" name="checkout">Checkout Sekarang</button>
    </form>

    <p><?php echo isset($checkout_message) ? $checkout_message : ''; ?></p>

    <?php include "layout/footer.html"; ?>
</body>
</html>




