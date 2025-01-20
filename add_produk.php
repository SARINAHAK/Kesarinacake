<?php
include 'koneksi.php';

if (isset($_POST['add_produk'])) {
    $nama = $_POST['nama_product'];
    $harga = $_POST['harga_product'];
    $gambar = $_FILES['gambar_product']['name'];
    $stok = $_POST['stok'];
    $target_dir = "uploaded_img/";
    $target_file = $target_dir . basename($_FILES["gambar_product"]["name"]);

    if (move_uploaded_file($_FILES["gambar_product"]["tmp_name"], $target_file)) {
        $query = "INSERT INTO produk (nama_product, harga_product, gambar_product, Stok) 
                  VALUES ('$nama', '$harga', '$gambar', '$stok')";
        if (mysqli_query($db, $query)) {
            echo "Produk berhasil ditambahkan.";
        } else {
            echo "Error: " . mysqli_error($db);
        }
    } else {
        echo "Gambar gagal diupload.";
    }
}
?>

<form method="POST" action="" enctype="multipart/form-data">
    <label for="nama_product">Nama Produk:</label>
    <input type="text" name="nama_product" required>
    <br>
    <label for="harga_product">Harga Produk:</label>
    <input type="number" name="harga_product" required>
    <br>
    <label for="gambar_product">Gambar Produk:</label>
    <input type="file" name="gambar_product" required>
    <br>
    <label for="stok">Stok:</label>
    <input type="number" name="stok" value="0" required>
    <br>
    <button type="submit" name="add_produk">Tambah Produk</button>
</form>
