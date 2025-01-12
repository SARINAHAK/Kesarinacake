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

<main class="main-content">
        <div class="breadcrumb">
            <a href="index.php">Beranda</a> / <span>produk</span>
        </div>
        

<main>
    

        <html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk - Kesarina Cake</title>
    <link rel="stylesheet" href="produk.css">
</head>
<body>
   
    <div id="header-placeholder"></div>

    <main>
        <section>
            <h2>Produk</h2>
            <p>Berikut adalah beberapa produk kami:</p>
            <div class="product-item">
                <img src="kue ulang tahun.jpeg" alt="Kue Ulang Tahun" width="230" height="280" />
                <h3>Kue Ulang Tahun</h3>
                <p>Harga: Rp 100.000</p>
                <input type="number" min="1" value="1" id="qty-2">
                <button onclick="addToCart('Tahu Skotel', 5000, 2)">Tambah ke Keranjang</button>
            </div>
            <div class="product-item">
                <img src="kue pernikahan.jpeg" alt="Kue Pernikahan" width="230" height="280" />
                <h3>Kue Pernikahan</h3>
                <p>Harga: Rp 300.000</p>
                <input type="number" min="1" value="1" id="qty-2">
                <button onclick="addToCart('Tahu Skotel', 5000, 2)">Tambah ke Keranjang</button>
            </div>
            <div class="product-item">
                <img src="kue Brownies.jpeg" alt="Brownies" width="230" height="280" />
                <h3>Brownies</h3>
                <p>Harga: Rp 100.000</p>
                <input type="number" min="1" value="1" id="qty-2">
                <button onclick="addToCart('Tahu Skotel', 5000, 2)">Tambah ke Keranjang</button>
            </div>
            <div class="product-item">
                <img src="kue pernikahan hijau.jpg" alt="kue pernikahan Hijau" width="230" height="280" />
                <h3>kue pernikahan Hijau</h3>
                <p>Harga: Rp 300.000</p>
                <input type="number" min="1" value="1" id="qty-2">
                <button onclick="addToCart('Tahu Skotel', 5000, 2)">Tambah ke Keranjang</button>
            </div>
            <div class="product-item">
                <img src="kue simple hijau.jpg" alt="kue ulang tahun simple" width="230" height="280" />
                <h3>kue ulang tahun</h3>
                <p>Harga: Rp 50.000</p>
                <input type="number" min="1" value="1" id="qty-2">
                <button onclick="addToCart('Tahu Skotel', 5000, 2)">Tambah ke Keranjang</button>
            </div>
            <div class="product-item">
                <img src="kue ulang tahun biru.jpg" alt="kue ulang tahun biru" width="230" height="280" />
                <h3>kue ulang tahun</h3>
                <p>Harga: Rp 100.000</p>
                <input type="number" min="1" value="1" id="qty-2">
                <button onclick="addToCart('Tahu Skotel', 5000, 2)">Tambah ke Keranjang</button>
            </div>
            <div class="product-item">
                <img src="kue ulang tahun orens.jpg" alt="kue ulang tahun orens" width="230" height="280" />
                <h3>kue ulang tahun</h3>
                <p>Harga: Rp 50.000</p>
                <input type="number" min="1" value="1" id="qty-2">
                <button onclick="addToCart('Tahu Skotel', 5000, 2)">Tambah ke Keranjang</button>
            </div>
            <div class="product-item">
                <img src="kue ultah anak sofia.jpg" alt="kue ulang tahun anak sofia" width="230" height="280" />
                <h3>kue ulang tahun</h3>
                <p>Harga: Rp 200.000</p>
                <input type="number" min="1" value="1" id="qty-2">
                <button onclick="addToCart('Tahu Skotel', 5000, 2)">Tambah ke Keranjang</button>
            </div>
            <div class="product-item">
                <img src="kue ultah anak spider man.jpg" alt="kue ulang tahun" width="230" height="280" />
                <h3>kue ulang tahun</h3>
                <p>Harga: Rp 250.000</p>
                <input type="number" min="1" value="1" id="qty-2">
                <button onclick="addToCart('Tahu Skotel', 5000, 2)">Tambah ke Keranjang</button>
            </div>
            <div class="product-item">
                <img src="kue ultah bir.jpg" alt="kue ulang tahun" width="230" height="280" />
                <h3>kue ulang tahun</h3>
                <p>Harga: Rp 350.000</p>
                <input type="number" min="1" value="1" id="qty-2">
                <button onclick="addToCart('Tahu Skotel', 5000, 2)">Tambah ke Keranjang</button>
            </div>
            <div class="product-item">
                <img src="kue ultah bunga.jpg" alt="kue ulang tahun" width="230" height="280" />
                <h3>kue ulang tahun</h3>
                <p>Harga: Rp 100.000</p>
                <input type="number" min="1" value="1" id="qty-2">
                <button onclick="addToCart('Tahu Skotel', 5000, 2)">Tambah ke Keranjang</button>
            </div>
            <div class="product-item">
                <img src="kue ultah miki mouse.jpg" alt="kue ulang tahun" width="230" height="280" />
                <h3>kue ulang tahun</h3>
                <p>Harga: Rp 250.000</p>
                <input type="number" min="1" value="1" id="qty-2">
                <button onclick="addToCart('Tahu Skotel', 5000, 2)">Tambah ke Keranjang</button>
            </div>
            
        </section>
    </main>

</body>
</html>


        <?php
        // Menghubungkan ke database
        include 'database.php';

        // Query untuk mengambil data produk dari tabel menu
        $query = "SELECT nama_product, harga_product, gambar_product, Stock FROM produk";
        $result = mysqli_query($conn, $query);

        // Periksa apakah koneksi dan query berhasil
        if (!$result) {
            die("Query gagal: " . mysqli_error($conn));
        }

        // Periksa apakah ada hasil
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="product-item">';
                echo '<img src="' . htmlspecialchars($row["gambar_product"]) . '" alt="' . htmlspecialchars($row["nama_product"]) . '">';
                echo '<h3>' . htmlspecialchars($row["nama_product"]) . '</h3>';
                echo '<p>Harga: Rp ' . number_format($row["harga_product"], 0, ',', '.') . '</p>';
                echo '<p>Stok: ' . htmlspecialchars($row["Stock"]) . '</p>';
                echo '<input type="number" min="1" max="' . htmlspecialchars($row["Stock"]) . '" value="1">';
                echo '<button>Tambah ke Keranjang</button>';
                echo '</div>';
            }
        } else {
            echo '<p>Tidak ada produk tersedia saat ini.</p>';
        }

        // Tutup koneksi database
        mysqli_close($conn);
        ?>
    </section>
</main>

</body>
</html>