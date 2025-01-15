<?php
session_start();

$produk = [
    ['id' => 1, 'nama' => 'Kue Ulang Tahun', 'harga' => 100000, 'gambar' => 'kue ulang tahun.jpeg'],
    ['id' => 2, 'nama' => 'Kue Pernikahan', 'harga' => 300000, 'gambar' => 'kue pernikahan.jpeg'],
    ['id' => 3, 'nama' => 'Brownies', 'harga' => 100000, 'gambar' => 'kue Brownies.jpeg'],
    ['id' => 4, 'nama' => 'Kue Pernikahan Hijau', 'harga' => 300000, 'gambar' => 'kue pernikahan hijau.jpg'],
    ['id' => 5, 'nama' => 'Kue Ulang Tahun Simple', 'harga' => 50000, 'gambar' => 'kue simple hijau.jpg'],
    ['id' => 6, 'nama' => 'Kue Ulang Tahun Biru', 'harga' => 100000, 'gambar' => 'kue ulang tahun biru.jpg'],
    ['id' => 7, 'nama' => 'Kue Ulang Tahun Orens', 'harga' => 50000, 'gambar' => 'kue ulang tahun orens.jpg'],
    ['id' => 8, 'nama' => 'Kue Ulang Tahun Anak Sofia', 'harga' => 200000, 'gambar' => 'kue ultah anak sofia.jpg'],
    ['id' => 9, 'nama' => 'Kue Ulang Tahun Spider-Man', 'harga' => 250000, 'gambar' => 'kue ultah anak spider man.jpg'],
    ['id' => 10, 'nama' => 'Kue Ulang Tahun Bir', 'harga' => 350000, 'gambar' => 'kue ultah bir.jpg'],
    ['id' => 11, 'nama' => 'Kue Ulang Tahun Bunga', 'harga' => 100000, 'gambar' => 'kue ultah bunga.jpg'],
    ['id' => 12, 'nama' => 'Kue Ulang Tahun Miki Mouse', 'harga' => 250000, 'gambar' => 'kue ultah miki mouse.jpg'],
    ['id' => 13, 'nama' => 'Kue Perayaan Komuni Pertama', 'harga' => 250000, 'gambar' => 'kue perayaan komuni pertama.jpg'],
];


if (isset($_POST['tambah_ke_keranjang'])) {
    $id_produk = $_POST['id_produk'];

    foreach ($produk as $item) {
        if ($item['id'] == $id_produk) {
            $_SESSION['keranjang'][] = $item;
            break;
        }
    }

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
        .breadcrumb {
            font-size: 14px;
            margin: 10px 0;
            white-space:wrap;
        }

        .breadcrumb a {
            text-decoration: none;
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
<main class="main-content">
        <div class="breadcrumb">
            <a href="index.php">Beranda</a> / <span>Kontak</span>
        </div>
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
