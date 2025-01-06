<?php
// Mengambil kata kunci dari parameter URL
if (isset($_GET['product'])) {
    $searchTerm = $_GET['product'];
    $products = json_decode(file_get_contents('products.json'), true);

    // Menyaring produk yang cocok dengan kata kunci
    $filteredProducts = array_filter($products, function($product) use ($searchTerm) {
        return stripos($product['name'], $searchTerm) !== false;
    });

    // Menampilkan hasil pencarian
    if (count($filteredProducts) > 0) {
        echo "<h2>Hasil Pencarian untuk '$searchTerm':</h2>";
        echo "<ul>";
        foreach ($filteredProducts as $product) {
            echo "<li><strong>" . htmlspecialchars($product['name']) . "</strong>: " . htmlspecialchars($product['description']) . " - Rp " . number_format($product['price'], 0, ',', '.') . "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>Produk tidak ditemukan untuk '$searchTerm'.</p>";
    }
}
?>
