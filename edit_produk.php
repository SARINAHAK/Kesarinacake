<?php
session_start();
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM produk WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $produk = mysqli_fetch_assoc($result); 
    } else {
        echo "Produk tidak ditemukan.";
        exit();
    }
}

if (isset($_POST['edit_product'])) {
    $id = $_POST['id'];
    $nama_product = $_POST['nama_product'];
    $harga_product = $_POST['harga_product'];
    $stok = $_POST['stok']; 
    $gambar_product = $_FILES['gambar_product']['name'];
    $gambar_product_tmp = $_FILES['gambar_product']['tmp_name'];

    // Cek jika ada gambar yang diupload
    if (!empty($gambar_product)) {
        $gambar_product_folder = 'uploaded_img/' . $gambar_product;
        if (move_uploaded_file($gambar_product_tmp, $gambar_product_folder)) {
            $query = "UPDATE produk SET nama_product = '$nama_product', harga_product = '$harga_product', gambar_product = '$gambar_product', stok = '$stok' WHERE id = $id";
        } else {
            echo "Gagal mengunggah gambar!";
            exit;
        }
    } else {
        $query = "UPDATE produk SET nama_product = '$nama_product', harga_product = '$harga_product', stok = '$stok' WHERE id = $id";
    }

    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: admin_produk.php"); // Redirect to product list page after successful update
    } else {
        echo "Gagal memperbarui produk: " . mysqli_error($conn); 
    }
}

if (isset($produk) && !empty($produk)) { ?>
    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Produk</title>
    </head>
    <body>
        <div class="container">
            <h2>Edit Produk</h2>

            <form method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $produk['id']; ?>">
                <input type="text" name="nama_product" placeholder="Nama Produk" value="<?php echo $produk['nama_product']; ?>" required>
                <input type="number" name="harga_product" placeholder="Harga Produk" value="<?php echo $produk['harga_product']; ?>" required>
                <input type="number" name="stok" placeholder="Stok" value="<?php echo $produk['stok']; ?>" required>
                <input type="file" name="gambar_product" accept="image/*"> 
                <button type="submit" name="edit_product">Perbarui Produk</button>
            </form>

        </div>
    </body>
    </html>
<?php } else { ?>
    <div class="container">
        <p>Produk tidak ditemukan.</p>
    </div>
<?php } ?>