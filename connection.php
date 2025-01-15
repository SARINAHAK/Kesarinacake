<?php

$host = "localhost";
$username = "root"; 
$password = "";
$database = "kesarina_cake";

$koneksi = mysqli_connect($host, $username, $password, "kesarina_cake");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}