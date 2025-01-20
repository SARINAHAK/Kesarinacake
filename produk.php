<?php
session_start();
include('koneksi.php'); 

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("Invalid CSRF token");
    }
}

$sql = "SELECT * FROM produk";
$result = $db->query($sql);

if (!$result) {
    die("Error: " . $conn->error);
}

$produk = array();
while($row = $result->fetch_assoc()) {
    $produk[] = $row;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tambah_ke_keranjang'])) {
    $id_produk = $_POST['id_produk'];

    foreach ($produk as $item) {
        if ($item['id'] == $id_produk) {
            if (!isset($_SESSION['keranjang'])) {
                $_SESSION['keranjang'] = [];
            }

            $sudah_ada = false;
            foreach ($_SESSION['keranjang'] as &$produk_keranjang) {
                if ($produk_keranjang['id'] == $id_produk) {
                    $produk_keranjang['jumlah'] += 1; 
                    $sudah_ada = true;
                    break;
                }
            }

            if (!$sudah_ada) {
                $_SESSION['keranjang'][] = [
                    'id' => $item['id'],
                    'nama' => $item['nama_product'],
                    'harga' => $item['harga_product'],
                    'jumlah' => 1
                ];
            }

            echo "<script>alert('Produk berhasil ditambahkan ke keranjang!');</script>";
            break;
        }
    }
}


$sql = "SELECT * FROM produk";
$result = $db->query($sql);

if (!$result) {
    die("Error: " . $conn->error);
}


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
            color: #333; 
            background-color: transparent;
            margin-bottom: 20px
        }
        .h2 {
            font-size: 20px;
            font-weight: bold;
            color:black(104, 112, 39); 
            margin-bottom: 20px;
            text-align: center;
        }

        .p {
            font-size: 10px;
        }

        .product-item {
            width: 200px;
            margin: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
            position: relative;
            padding: 20px;
            background-color: #ffff;
        }
        
        .product-item:hover {
            transform: translateY(-5px); 
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2); 
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
            font-size: 15px;
            margin-bottom: 10px;
        }

        .product-item p {
            color: black;
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

        
        .search-form {
            text-align: center;
            margin-bottom: 20px;
        }

        .search-form input {
            padding: 10px;
            width: 300px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .search-form button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #3498db;
            color: white;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <main>
    <div class="breadcrumb">
            <a href="index.php">Beranda</a> / <span>Produk</span>
        </div>

        <form method="GET" action="" class="search-form">
            <input type="text" name="cari" placeholder="Cari nama kue..."
                   value="<?php echo isset($_GET['cari']) ? htmlspecialchars($_GET['cari']) : ''; ?>">
            <button type="submit">Cari</button>
        </form>
        <div class="h2">
        <h2>Produk</h2>
        <p>Berikut adalah beberapa produk kami:</p>
        </h2>
        <?php if (count($produk) === 0): ?>
            <p style="text-align: center; color: red;">Produk tidak ditemukan.</p>
        <?php endif; ?>

        <div class="product-container">
            <?php foreach ($produk as $item): ?>
                <div class="product-item">
                    <img src="uploaded_img/<?php echo $item['gambar_product']; ?>" alt="<?php echo $item['nama_product']; ?>">
                    <h3><?php echo $item['nama_product']; ?></h3>
                    <p>Harga: Rp <?php echo number_format($item['harga_product'], 0, ',', '.'); ?></p>
                    <p>Stok: <?php echo $item['stok'] > 0 ? $item['stok'] : 'Habis'; ?></p>

                    <?php if ($item['stok'] > 0): ?>
                        <form method="POST" action="">
                            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                            <input type="hidden" name="id_produk" value="<?php echo $item['id']; ?>">
                            <button type="submit" name="tambah_ke_keranjang">Tambah ke Keranjang</button>
                        </form>
                    <?php else: ?>
                        <button disabled style="background-color: #ccc; cursor: not-allowed;">Stok Habis</button>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
</body>
</html>