<?php
session_start();
include('config.php'); // Sertakan sambungan database

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("Invalid CSRF token"); 
    }

    // ... (proses data formulir) ...
}


// Query untuk mengambil data produk
$sql = "SELECT * FROM produk";
$result = $conn->query($sql);

// Periksa apakah query berhasil
if (!$result) {
    die("Error: " . $conn->error);
}

// Simpan data produk dalam array
$produk = array();
while($row = $result->fetch_assoc()) {
    $produk[] = $row;
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
            background-color:rgb(133, 29, 29);
        }

        .product-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            text-align: center;
            color: #333; /* Warna teks menjadi abu-abu */
            background-color:rgb(136, 43, 43);
            magin-bottom: 20px
        }
        .h2 {
            font-size: 24px;
            font-weight: bold;
            color: #3498db; /* Ubah warna judul menjadi biru */
            margin-bottom: 20px;
            text-align: center;
        }

        .p {
            font-size: 16px;
        }

        .product-item {
            width: 300px;
            margin: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
            position: relative; /* Untuk memposisikan gambar secara absolut */
        }

        .product-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .product-item .product-info {
            padding: 15px;
        }

        .product-item h3 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .product-item p {
            color: #666;
            margin-bottom: 15px;
        }

        .product-item button {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <main>
        <div class="breadcrumb">
            <a href="index.php">Beranda</a> / <span>Produk</span> 
        </div>

        <h2>Produk</h2>
        <p>Berikut adalah beberapa produk kami:</p>

        <div class="product-container">
            <?php foreach ($produk as $item): ?>
                <div class="product-item">
                    <img src="uploaded_img/<?php echo $item['gambar_product']; ?>" alt="<?php echo $item['nama_product']; ?>">
                    <h3><?php echo $item['nama_product']; ?></h3>
                    <p>Harga: Rp <?php echo number_format($item['harga_product'], 0, ',', '.'); ?></p>
                    <form method="POST" action="">
                        <input type="hidden" name="id_produk" value="<?php echo $item['id']; ?>">
                        <button type="submit" name="tambah_ke_keranjang">Tambah ke Keranjang</button>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
</body>
</html>