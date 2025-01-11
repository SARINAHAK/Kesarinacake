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
        .footer-
    </style>
</head>

<body>
    <!-- Header Section -->
    <header>
        <nav class="navbar">
            <ul class="nav-links">
                <li><a href="index.html">Beranda</a></li>
                <li><a href="produk.html">Produk</a></li>
                <li><a href="kontak.html">Kontak</a></li>
            </ul>
            <div class="nav-icons">
                <a href="cari.html" class="cari">
                    <img src="https://www.freeiconspng.com/uploads/search-icon-png-0.png" alt="Cari" class="icon">
                </a>
                <a href="keranjang.html" class="Keranjang">
                    <img src="https://purepng.com/public/uploads/medium/purepng.com-shopping-cartshoppingcarttrolleycarriagebuggysupermarkets-1421526532325wtdqo.png" alt="Keranjang" class="icon">
                </a>
                <a href="login.html" class="Register">
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

    <!-- Footer Section -->
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-column">
                <h3>USEFUL LINK</h3>
                <ul>
                    <li><a href="index.html">Beranda</a></li>
                    <li><a href="produk.html">Produk</a></li>
                    <li><a href="kontak.html">Kontak</a></li>
                    <li><a href="login.html">Login</a></li>
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
                <p>Website kami adalah website coba-coba!</p>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; <?php echo date("Y"); ?> Kesarina Cake</p>
        </div>
    </footer>
</body>
</html>
