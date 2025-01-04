<?php
include 'config.php';

$query = "SELECT * FROM orders";
$result = mysqli_query($conn, $query);
?>

<h2>Daftar Pesanan</h2>
<table style="width: 100%; border-collapse: collapse;">
    <thead>
        <tr styel="background-color: #f3f4f6; border: 1px solid #ddd">
            <th>ID Pesanan</th>
            <th>Nama Pelanggan</th>
            <th>Produk</th>
            <th>Total Harga</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($order = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?= $order['id'] ?></td>
            <td><?= htmlspecialchars($order['customer_name']) ?></td>
            <td><?= htmlspecialchars($order['product_details']) ?></td>
            <td><?= htmlspecialchars($order['total_price'], 0, ',', '.') ?></td>
            <td><?= htmlspecialchars($order['status']) ?></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>