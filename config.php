<?php
$host = "localhost";
$username = "root";  // ganti dengan username database Anda
$password = "";  // ganti dengan password database Anda
$dbname = "kesarina_cake";  // ganti dengan nama database Anda

// Membuat koneksi
$conn = mysqli_connect($host, $username, $password, $dbname);

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
