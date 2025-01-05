<?php
include 'config.php';

$query = "SELECT * FROM product";
$result = mysqli_query($conn, $query);
?>

<h2>Kelola Produk</h2>
<table style="width: 100%; border-collapse: collapse;">
    <thead>
        <tr style="background-color: #f5a623; border: 1px solid #ddd;">
            <th>ID</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
         <?php while ($product = mysqli_fetch_assoc($result) ): ?>
            <tr>
                <td><?= $product['id'] ?></td>
                <td><?= htmlspecialchars($product['name']) ?></td>
                <td><?= number_format($product['price'], 0, ',', '.') ?>
                    <button onclick="editProduct(<?= $product['id'] ?>)">Edit</button>
                    <button onclick="deleteProduct(<?=$product['id'] ?>)">Hapus</button>
                 </td>
            </tr>
           <?php endwhile ?>
    </tbody>
</table>
<button onclick="addProduct()">Tambah produk baru</button>