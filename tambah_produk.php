<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk - Kesarina Cake</title>
</head>
<body>
    <h2>Tambah Produk Baru</h2>
    <form action="upload_produk.php" method="post" enctype="multipart/form-data">
        Nama Produk: <input type="text" name="nama_product" required><br>
        Harga Produk: <input type="number" name="harga_product" required><br>
        Gambar Produk: <input type="file" name="gambar_product" required><br>
        Stok Produk: <input type="number" name="stock" required><br>
        <button type="submit">Tambah Produk</button>
    </form>
</body>
</html>

<?php
include 'database.php';

if (isset($_POST["submit"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["gambar_product"]["name"]);
    $uploadOk = 1;

    // Validasi file gambar
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $allowed_types = ['jpg', 'jpeg', 'png'];

    // Periksa apakah file benar-benar gambar
    if (in_array($imageFileType, $allowed_types)) {
        if (move_uploaded_file($_FILES["gambar_product"]["tmp_name"], $target_file)) {
            // Simpan path gambar ke database
            $nama_produk = "kue ulang tahun ";  // Sesuaikan nama produk sesuai input
            $harga_produk = 100000;  // Sesuaikan harga produk
            $stok_produk = 10;  // Sesuaikan stok
            $sql = "INSERT INTO produk (nama_product, harga_product, gambar_product, Stock) 
                    VALUES ('$nama_produk', $harga_produk, '$target_file', $stok_produk)";

            if (mysqli_query($conn, $sql)) {
                echo "Gambar berhasil diunggah dan data produk disimpan.";
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        } else {
            echo "Terjadi kesalahan saat mengunggah gambar.";
        }
    } else {
        echo "Tipe file tidak diizinkan. Hanya JPG, JPEG, dan PNG yang diperbolehkan.";
    }

    mysqli_close($conn);
}
?>
