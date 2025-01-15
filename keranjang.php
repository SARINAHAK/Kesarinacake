<?php
<?php

// Menyertakan koneksi ke database produk (config.php) dan database keranjang (database.php)
include "config.php";  // Koneksi ke database produk
include "database.php"; // Koneksi ke database keranjang

session_start();

// Jika keranjang kosong
if (empty($_SESSION['keranjang'])) {
    $keranjang_kosong = true;
} else {
    $keranjang = $_SESSION['keranjang'];
    $keranjang_kosong = false;

    // Menghitung total harga
    $totalHarga = 0;
    foreach ($keranjang as $item) {
        $totalHarga += $item['harga'];  // Pastikan ini menghitung semua harga produk dalam keranjang
    }
}


if (isset($_POST['hapus']) && isset($_POST['hapus_index'])) {
    $index = $_POST['hapus_index'];
    
    // Hapus item dari session keranjang berdasarkan index
    unset($_SESSION['keranjang'][$index]);
    
    // Re-index array keranjang agar index tetap berurutan
    $_SESSION['keranjang'] = array_values($_SESSION['keranjang']);
    
    // Redirect ke halaman keranjang untuk menghindari resubmission form
    header("Location: keranjang.php");
    exit;
}

// Proses tambah ke keranjang
if (isset($_POST['tambah_ke_keranjang'])) { // Langkah 2: Proses tambah ke keranjang
    $id_produk = $_POST['id_produk'];
    $nama_produk = $_POST['nama_produk'];
    $harga_produk = $_POST['harga_product'];

    // Buat array produk
    $produk_baru = [
        'id' => $id_produk,
        'nama' => $nama_produk,
        'harga' => $harga_product,
    ];

    // Tambahkan produk ke keranjang (session)
    if (!isset($_SESSION['keranjang'])) {
        $_SESSION['keranjang'] = [];
    }
    $_SESSION['keranjang'][] = $produk_baru;

    // Redirect ke halaman keranjang untuk mencegah resubmission form
    header("Location: keranjang.php");
    exit;
}

// Jika sudah login, lanjutkan proses checkout
if (isset($_POST['checkout'])) {
    // Periksa apakah pembeli sudah login
    if (!isset($_SESSION['user_id'])) {
        // Jika belum login, arahkan ke halaman login dan tampilkan pesan
        echo "<script>
                alert('Silakan login atau register terlebih dahulu untuk melanjutkan checkout.');
                window.location.href = 'login.php';
              </script>";
        exit;
    }

    // Jika sudah login, lanjutkan proses checkout
    $username = $_POST['nama'];
    $nomor = $_POST['nomor'];
    $alamat = $_POST['alamat'];

    // Menyimpan data ke database keranjang (tabel keranjang)
    $sql = "INSERT INTO keranjang (nama, nomor, alamat) VALUES ('$username', '$nomor', '$alamat')";

    if ($db_checkout->query($sql)) {  // Gunakan $db_checkout untuk koneksi ke database keranjang
        unset($_SESSION['keranjang']);
        echo "Pemesanan berhasil! Keranjang anda sekarang kosong";
    }else {
        echo "checkout gagal, cek jaringan anda";
    }
    unset($_SESSION['keranjang']); 

    // Simulasi proses checkout
    // Di sini Anda dapat menyimpan data checkout ke dalam database jika perlu

    // Menampilkan pesan setelah checkout berhasil
    $checkout_message = "Pemesanan berhasil! Anda akan segera dihubungi oleh tim kami.";
    unset($_SESSION['keranjang']); // Kosongkan keranjang setelah pemesanan
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang - Kesarina Cake</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f0f0f0;
            text-align: center; /* Menambahkan agar konten di dalam body rata tengah */
        }

        h1 {
            color: #ad2020;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ad2020;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #ad2020;
            color: white;
        }

        .total {
            font-weight: bold;
            color: #ad2020;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 18px;
            color: white;
            background-color: #3498db;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .button:hover {
            background-color: #2980b9;
        }

        .empty-message {
            font-size: 18px;
            color: #666;
            font-weight: bold;
        }

        .back-button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 18px;
            background-color: #e74c3c;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            margin-top: 20px;
        }

        .back-button:hover {
            background-color: #c0392b;
        }

        .checkout-form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .checkout-form input, .checkout-form textarea, .checkout-form button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ddd;
            font-size: 16px;
        }

        .checkout-form button {
            background-color: #3498db;
            color: white;
            cursor: pointer;
        }

        .checkout-form button:hover {
            background-color: #2980b9;
        }

    </style>
</head>
<body>
    <h1>Keranjang Belanja</h1>

    <?php if ($keranjang_kosong): ?>
        <p class="empty-message">Keranjang Anda masih kosong. Silakan tambahkan produk terlebih dahulu!</p>
    <?php else: ?>
        <table>
            <tr>
                <th>Nama Menu</th>
                <th>Harga</th>
                <th>Aksi</th> Kolom baru untuk tombol hapus
            </tr>
            <?php foreach ($keranjang as $index => $item): ?>
                <tr>
                    <td><?php echo $item['nama']; ?></td>
                    <td>Rp <?php echo number_format($item['harga'], 0, ',', '.'); ?></td>
                    <td>
                        <!-- Tombol Hapus mengirimkan index item yang ingin dihapus -->
                        <form action="keranjang.php" method="POST" style="display:inline;">
                            <input type="hidden" name="hapus_index" value="<?php echo $index; ?>">
                            <button type="submit" name="hapus" class="button" style="background-color: #e74c3c;">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            <tr>
                 <td class="total">Total Harga</td>
                 <td>Rp <?php echo number_format($totalHarga, 0, ',', '.'); ?></td>
                 <td></td>
            </tr>
        </table>
    <?php endif; ?>

    <?php if (!$keranjang_kosong): ?>
        <div class="checkout-form">
            <h3>Isi Data Anda untuk Checkout</h3>
            <form action = "keranjang.php" method="POST">
                <input type="text" name="nama" placeholder="Nama" required>
                <input type="text" name="nomor" placeholder="Nomor Telepon" required>
                <textarea name="alamat" placeholder="Alamat Lengkap" required></textarea>
                <button type="submit" name="checkout" class="button">Checkout Sekarang</button>
            </form>
        </div>
    <?php endif; ?>

    <p><?php echo isset($checkout_message) ? $checkout_message : ''; ?></p>

    <!-- Tombol Kembali ke Menu -->
    <a href="produk.php" class="back-button">Kembali ke Menu</a>

</body>
</html>
