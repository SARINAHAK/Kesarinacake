<?php
// Database configuration
$servername = "localhost";  // or the host where your database is
$username = "root";         // your database username
$password = "";             // your database password (empty for default)
$dbname = "login";  // your database name

// Create connection
$db = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>
