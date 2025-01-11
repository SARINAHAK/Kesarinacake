<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk - Kesarina Cake</title>
    <style>
        /* Gaya tampilan halaman */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #ad2020;
        }
        main {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f7f7f7;
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
        input[type="number"] {
            width: 60px;
            padding: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
            text-align: center;
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
        <p>Berikut adalah beberapa produk unggulan dari Kesarina Cake:</p>

        <?php
        // Daftar produk
        $products = [
            ["image" => "kue ulang tahun.jpeg", "name" => "Kue Ulang Tahun", "price" => 100000],
            ["image" => "kue pernikahan.jpeg", "name" => "Kue Pernikahan", "price" => 300000],
            ["image" => "kue Brownies.jpeg", "name" => "Brownies", "price" => 100000],
            ["image" => "kue pernikahan hijau.jpg", "name" => "Kue Pernikahan Hijau", "price" => 300000],
            ["image" => "kue simple hijau.jpg", "name" => "Kue Ulang Tahun Sederhana", "price" => 50000],
            ["image" => "kue ulang tahun biru.jpg", "name" => "Kue Ulang Tahun Biru", "price" => 100000],
            ["image" => "kue ulang tahun orens.jpg", "name" => "Kue Ulang Tahun Oranye", "price" => 50000],
            ["image" => "kue ultah anak sofia.jpg", "name" => "Kue Ulang Tahun Sofia", "price" => 200000],
            ["image" => "kue ultah anak spider man.jpg", "name" => "Kue Ulang Tahun Spiderman", "price" => 250000],
            ["image" => "kue ultah bir.jpg", "name" => "Kue Ulang Tahun Bir", "price" => 350000],
            ["image" => "kue ultah bunga.jpg", "name" => "Kue Ulang Tahun Bunga", "price" => 100000],
            ["image" => "kue ultah miki mouse.jpg", "name" => "Kue Ulang Tahun Mickey Mouse", "price" => 250000]
        ];

        // Tampilkan produk
        foreach ($products as $product) {
            echo '<div class="product-item">';
            echo '<img src="' . $product["image"] . '" alt="' . $product["name"] . '">';
            echo '<h3>' . $product["name"] . '</h3>';
            echo '<p>Harga: Rp ' . number_format($product["price"], 0, ',', '.') . '</p>';
            echo '<input type="number" min="1" value="1">';
            echo '<button>Tambah ke Keranjang</button>';
            echo '</div>';
        }
        ?>
    </section>
</main>

</body>
</html>
