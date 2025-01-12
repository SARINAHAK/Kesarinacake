<?php
session_start();

// Simulasi produk dari database
$produk = [
    ['id' => 1, 'nama' => 'Kue Ulang Tahun', 'harga' => 100000, 'gambar' => 'kue ulang tahun.jpeg'],
    ['id' => 2, 'nama' => 'Kue Pernikahan', 'harga' => 300000, 'gambar' => 'kue pernikahan.jpeg'],
    ['id' => 3, 'nama' => 'Brownies', 'harga' => 100000, 'gambar' => 'kue Brownies.jpeg'],
    ['id' => 4, 'nama' => 'Kue Pernikahan Hijau', 'harga' => 300000, 'gambar' => 'kue pernikahan hijau.jpg'],
    // Tambahkan produk lainnya
];

// Menambahkan produk ke keranjang saat tombol ditekan
if (isset($_POST['tambah_ke_keranjang'])) {
    $id_produk = $_POST['id_produk'];

    // Cari produk berdasarkan ID
    foreach ($produk as $item) {
        if ($item['id'] == $id_produk) {
            // Simpan produk ke session keranjang
            $_SESSION['keranjang'][] = $item;
            break;
        }
    }

    // Redirect ke halaman keranjang
    header("Location: keranjang.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk - Kesarina Cake</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #ad2020;
        }
        main {
            max-width: 1000px;
            margin: 20px auto;
            padding: 20px;
            background-color: rgb(240, 223, 223);
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #ad2020;
        }
        p {
            text-align: center;
            color: #666;
            margin-bottom: 20px;
        }
        .product-item {
            display: inline-block;
            background-color: #fff;
            width: 250px;
            margin: 15px;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .product-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }
        .product-item img {
            width: 230px;
            height: 230px;
            border-radius: 10px;
            margin-bottom: 10px;
            object-fit: cover;
        }
        .product-item h3 {
            color: #333;
            font-size: 18px;
        }
        .product-item p {
            color: #e67e22;
            font-weight: bold;
        }
        button {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <main>
        <section>
            <h2>Produk</h2>
            <p>Berikut adalah beberapa produk kami:</p>
            
            <?php foreach ($produk as $item): ?>
            <div class="product-item">
                <img src="<?php echo $item['gambar']; ?>" alt="<?php echo $item['nama']; ?>">
                <h3><?php echo $item['nama']; ?></h3>
                <p>Harga: Rp <?php echo number_format($item['harga'], 0, ',', '.'); ?></p>
                <form method="POST" action="">
                    <input type="hidden" name="id_produk" value="<?php echo $item['id']; ?>">
                    <button type="submit" name="tambah_ke_keranjang">Tambah ke Keranjang</button>
                </form>
            </div>
            <?php endforeach; ?>
        </section>
    </main>
</body>
</html>