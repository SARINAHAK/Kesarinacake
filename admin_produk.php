<?php
session_start();
include ('koneksi.php');

if ($_SESSION['user_id'] != 0) {
    header("Location: login.php");
    exit();
}


if (isset($_POST['add_product'])) {
    $nama_product = $_POST['nama_product'];
    $harga_produk = $_POST['harga_product'];
    $stok = $_POST['stok'];
    $gambar_product = $_FILES['gambar_product']['name'];
    $gambar_product_tmp = $_FILES['gambar_product']['tmp_name'];

    if (empty($nama_product)) {
        $message = "Nama produk tidak boleh kosong.";
    } else { 
        $gambar_product_folder = 'uploaded_img/' . $gambar_product;

        if (move_uploaded_file($gambar_product_tmp, $gambar_product_folder)) {
            $query = "INSERT INTO produk (nama_product, harga_product, gambar_product, stok) 
                      VALUES (?, ?, ?, ?)";
            $stmt = $db->prepare($query);
            $stmt->bind_param("siss", $nama_product, $harga_produk, $gambar_product, $stok);

            if ($stmt->execute()) {
                $message = 'Produk berhasil ditambahkan!';
            } else {
                $message = 'Gagal menambahkan produk: ' . $stmt->error;
            }
        } else {
            $message = 'Gagal mengunggah gambar!';
        }
    }
}

if (isset($_POST['edit_product'])) {
    $id = $_POST['id'];
    $nama_product = $_POST['nama_product'];
    $harga_product = $_POST['harga_product'];
    $stok = $_POST['stok_product']; 
    $gambar_product = $_FILES['gambar_product']['name'];
    $gambar_product_tmp = $_FILES['gambar_product']['tmp_name'];

    if (!empty($gambar_product)) {
        $gambar_product_folder = 'uploaded_img/' . $gambar_product;
        move_uploaded_file($gambar_product_tmp, $gambar_product_folder);
        $query = "UPDATE produk SET nama_product = '$nama_product', harga_product = '$harga_product', gambar_product = '$gambar_product', stok = '$stok' WHERE id = $id"; 
    } else {
        $query = "UPDATE produk SET nama_product = '$nama_product', harga_product = '$harga_product', stok = '$stok' WHERE id = $id";
    }

    $result = mysqli_query($db, $query);
    if ($result) {
        $message = 'Produk berhasil diperbarui!';
    } else {
        $message = 'Gagal memperbarui produk!';
    }
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = "DELETE FROM produk WHERE id = $id";
    $result = mysqli_query($db, $query);
    if ($result) {
        $message = 'Produk berhasil dihapus!';
    } else {
        $message = 'Gagal menghapus produk!';
    }
}

$query = "SELECT * FROM produk";
$result = $db->query($query);
if ($result) {
    $produk = $result->fetch_all(MYSQLI_ASSOC); 
} else {
    echo "Error: " . $db->error;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk - Kesarina Cake</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <style>body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f9f9f9;
    color: #333;
}

.container {
    width: 90%;
    max-width: 1200px;
    margin: 20px auto;
    background-color: #fff;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

h2 {
    text-align: center;
    color: #333;
}

form {
    margin-bottom: 30px;
    padding: 10px;
    background-color: #f0f0f0;
    border-radius: 8px;
}

form h3 {
    margin-bottom: 15px;
    color: #555;
}

form input[type="text"],
form input[type="number"],
form input[type="file"] {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

form button {
    padding: 10px 15px;
    background-color: #28a745;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

form button:hover {
    background-color: #218838;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 12px;
    text-align: left;
}

th {
    background-color: #007bff;
    color: white;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #ddd;
}

td img {
    max-width: 100px;
    max-height: 100px;
    border-radius: 8px;
}

tr td a {
    display: inline-block;
    margin: 5px;
    padding: 5px 10px;
    text-decoration: none;
    color: white;
    background-color: #007bff;
    border-radius: 5px;
}

tr td a:hover {
    background-color: #0056b3;
}

p {
    padding: 10px;
    background-color: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
    border-radius: 5px;
    margin-top: 15px;
}
</style>
    <div class="container">
        <h2>Daftar Produk</h2>
        <form method="POST" enctype="multipart/form-data">
            <h3>Tambah Produk</h3>
            <input type="text" name="nama_product" placeholder="Nama Produk" required>
            <input type="number" name="harga_product" placeholder="Harga Produk" required>
            <input type="number" name="stok" placeholder="stok" required> 
            <input type="file" name="gambar_product" accept="image/*" required>
            <button type="submit" name="add_product">Tambah Produk</button>
        </form>

        <?php if (isset($message)) { echo "<p>$message</p>"; } ?>

        <table border="1">
            <thead>
                <tr>
                    <th>Gambar</th>
                    <th>Nama Produk</th>
                    <th>Harga Produk</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($produk as $item): ?>
                    <tr>
                        <td><img src="uploaded_img/<?php echo $item['gambar_product']; ?>" width="100" height="100" alt="gambar produk"></td>
                        <td><?php echo $item['nama_product']; ?></td>
                        <td>Rp <?php echo number_format($item['harga_product'], 0, ',', '.'); ?></td>
                        <td><?php echo isset($item['stok']) ? $item['stok'] : '0'; ?></td>

                        <td>
                            <a href="edit_produk.php?id=<?php echo $item['id']; ?>">Edit</a>
                            <a href="admin_produk.php?delete=<?php echo $item['id']; ?>">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>



