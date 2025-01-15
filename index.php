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
            padding: 5px;
            border-radius: 30px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            position: relative;
            transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out;
            opacity: 0;
            transform: scale(0.8);
            align-items: center;
            height: 32px; /* Tinggi menyesuaikan ikon */
        }

        .search-box.active {
            display: flex; /* Ubah menjadi fleksibel untuk rata tengah */
            opacity: 1;
            transform: scale(1);
        }

        .search-box input {
            width: 150px; /* Lebar menyesuaikan */
            height: 100%; /* Sesuaikan tinggi */
            padding: 5px;
            border: 1px solid #ad2020;
            border-radius: 20px;
            outline: none;
            font-size: 14px;
            transition: border-color 0.3s;
        }

        .search-box input:focus {
            border-color: #ff5c5c;
            box-shadow: 0 0 8px rgba(255, 92, 92, 0.5);
        }

        .search-box button {
            background-color: #ad2020;
            color: white;
            border: none;
            border-radius: 20px;
            padding: 5px 8px; /* Menyesuaikan dengan tinggi ikon */
            cursor: pointer;
            margin-left: 5px;
            height: 100%; /* Sesuaikan tinggi */
            font-size: 12px; /* Sesuaikan font */
            transition: background-color 0.3s;
        }

        .search-box button:hover {
            background-color: #ff5c5c;
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
                <p>Website kami adalah website yang menjual kue perayaan "seperti: kue ulang tahun,pernikahan,komuni pertama" </p>
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


</body>
</html>
