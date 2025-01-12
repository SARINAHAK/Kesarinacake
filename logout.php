<?php
// Mulai sesi
session_start();

// Hapus semua session
session_unset();

// Hancurkan sesi
session_destroy();

// Redirect ke halaman utama atau login
header('Location: index.php');
exit();
?>
