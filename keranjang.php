<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cart = json_decode(file_get_contents('php://input'), true);

    if (!empty($cart)) {
        // Simulasi penyimpanan ke database atau pemrosesan checkout
        echo json_encode(["status" => "success", "message" => "Checkout berhasil"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Keranjang kosong"]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Metode tidak valid"]);
}
?>



