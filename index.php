<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kesarina Cake - Aplikasi Web</title>
    
    <style>
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #ad2020;
        }

       
        .navbar ul {
            list-style: none;
            display: flex;
            gap: 15px;
            margin: 20px;
            justify-content: left;
        }

        .navbar li {
            display: inline;
        }

        .navbar a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }

        .navbar a:hover {
            color: #5c5e5f;
        }

        .nav-icons {
            display: flex;
            gap: 15px;
            justify-content: right;
            margin: 20px;
        }

        .icon {
            width: 24px;
            height: 24px;
        }

        .hero {
            height: 300px;
            background: url(bener.png) no-repeat center center/cover;
            display: flex;
            justify-content: center;
            align-items: center;
            color: red;
            text-align: center;
        }

        .hero h1 {
            font-size: 2.5rem;
            background: rgba(0, 0, 0, 0.5);
            color: rgb(206, 186, 186);
            padding: 10px 20px;
            border-radius: 5px;
        }

        
        footer {
            background-color: #333;
            color: white;
            padding: 20px 0;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            padding: 0 20px;
        }

        .footer-column h3 {
            margin-bottom: 10px;
            font-size: 1.2em;
        }

        .footer-column ul {
            list-style: none;
            padding: 0;
        }

        .footer-column ul li {
            margin: 5px 0;
        }

        .footer-column ul a {
            text-decoration: none;
            color: white;
        }

        .footer-column ul a:hover {
            background-color: #504c4c;
        }

        .footer-bottom {
            text-align: center;
            padding: 10px;
            border-top: 1px solid #555;
            margin-top: 20px;
        }

        .search-box {
            display: none; 
            margin-right: 10px; 
            background-color: white;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .search-box input {
            width: 200px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .search-box button {
            background-color: #ad2020;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 6px 12px;
            cursor: pointer;
        }

        .search-box button:hover {
            background-color: #ad2020;
        }

        .search-box.active {
            display: block;
        }


    </style>
</head>

<body>
    <header>
        <nav class="navbar">
            <ul class="nav-links">
                <li><a href="index.php">Beranda</a></li>
                <li><a href="produk.php">Produk</a></li>
                <li><a href="kontak.php">Kontak</a></li>
            </ul>
            <div class="nav-icons">
            <div class="search-box" id="searchBox">
                <form method="GET" action="index.php">
                    <input type="text" name="query" placeholder="Cari produk..." required>
                    <button type="submit">Cari</button>
                </form>
            </div>

                <a href="javascript:void(0);" class="cari" onclick="toggleSearchBox()">
                    <img src="https://www.freeiconspng.com/uploads/search-icon-png-0.png" alt="Cari" class="icon">
                </a>

                <a href="keranjang.php" class="Keranjang">
                    <img src="https://purepng.com/public/uploads/medium/purepng.com-shopping-cartshoppingcarttrolleycarriagebuggysupermarkets-1421526532325wtdqo.png" alt="Keranjang" class="icon">
                </a>
                <a href="login.php" class="Register">
                    <img src="https://icon-library.com/images/login-icon/login-icon-3.jpg" alt="Login" class="icon">
                </a>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero" id="beranda">
        <div class="hero-overlay">
            <h1>Selamat Datang di Kesarina Cake</h1>
    </div>
    </section>

    <footer class="footer">
        <div class="footer-content">
            <div class="footer-column">
                <h3>USEFUL LINK</h3>
                <ul>
                    <li><a href="index.php">Beranda</a></li>
                    <li><a href="produk.php">Produk</a></li>
                    <li><a href="kontak.php">Kontak</a></li>
                    <li><a href="login.php">Login</a></li>
                </ul>
            </div>

            <div class="footer-column">
                <h3>KONTAK</h3>
                <p>
                    jl. Bedugul No. 6<br>
                    Yehning, Sidakarya<br>
                    Denpasar, Bali<br>
                    Telepon 1: 081704624906<br>
                    WhatsApp: 081704624906<br>
                </p>
            </div>

            <div class="footer-column">
                <h3>Tentang Kami</h3>
                <p>Website kami adalah website yang me  njual kue perayaan "seperti: kue ulang tahun,pernikahan,komuni pertama" </p>
                <p>kami siap melayani anda</p>
                <p>Mungkin ada request?. Silakan ajukan request Anda. Saya siap membantu!😊</p>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; <?php echo date("Y"); ?> Kesarina Cake</p>
        </div>
    </footer>


    <script>
        function toggleSearchBox() {
            var searchBox = document.getElementById('searchBox');
            searchBox.classList.toggle('active'); 
        }
    </script>

<?php
include 'config.php';

$query = "SELECT * FROM produk";
$result = mysqli_query($conn, $query);
?>

<h2>Daftar Produk</h2>
<?php while ($row = mysqli_fetch_assoc($result)): ?>
    <div>
        <img src="uploads/<?php echo $row['gambar_product']; ?>" alt="<?php echo $row['nama_product']; ?>" width="100">
        <h3><?php echo $row['nama_product']; ?></h3>
        <p>Harga: Rp <?php echo number_format($row['harga_product'], 0, ',', '.'); ?></p>
        <p>stok: <?php echo $row['stok']; ?></p>
        <a href="edit_produk.php?id=<?php echo $row['id']; ?>">Edit</a> | 
        <a href="hapus_produk.php?id=<?php echo $row['id']; ?>">Hapus</a>
    </div>
<?php endwhile; ?>



</body>
</html>
