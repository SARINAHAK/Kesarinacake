<?php
// Konfigurasi koneksi database
$host = "localhost";  // Alamat server database
$username = "root";   // Username database
$password = "";       // Password database (kosong untuk default XAMPP)
$database = "kesarinacake"; // Nama database

// Membuat koneksi
$conn = mysqli_connect($host, $username, $password, $database);

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
} else {
    // echo "Koneksi berhasil";
}
?>
