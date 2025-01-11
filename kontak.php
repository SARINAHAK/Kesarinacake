<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak - Kesarina Cake</title>
    <style>
        /* Gaya untuk formulir kontak */
        .contact-form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group textarea {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            resize: none;
            min-height: 100px;
        }

        .submit-btn {
            background-color: #25d366; 
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .submit-btn:hover {
            background-color: #ad2020; 
        }
    </style>
</head>
<body>
    <main class="main-content">
        <div class="breadcrumb">
            <a href="index.php">Beranda</a> / <span>Kontak</span>
        </div>
        <h2>Kontak</h2>

        <!-- Form Kontak -->
        <form method="POST" action="">
            <div class="form-group">
                <input type="text" name="nama" placeholder="Nama" required>
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <textarea name="pesan" placeholder="Pesan Anda" rows="5" required></textarea>
            </div>
            <button type="submit" class="submit-btn">Kirim ke WhatsApp</button>
        </form>
    </main>

    <?php
    // Kode PHP untuk menangani form
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = htmlspecialchars($_POST['nama']);
        $email = htmlspecialchars($_POST['email']);
        $pesan = htmlspecialchars($_POST['pesan']);

        // Format pesan untuk WhatsApp
        $whatsapp_message = "Halo, saya ingin bertanya mengenai produk Kesarina Cake.%0ANama: $nama%0AEmail: $email%0APesan: $pesan";

        // Nomor WhatsApp tujuan (ganti dengan nomor Anda)
        $whatsapp_number = "6285298770635";

        // Redirect ke WhatsApp
        echo "<script>
                window.location.href = 'https://wa.me/$whatsapp_number?text=" . urlencode($whatsapp_message) . "';
              </script>";
    }
    ?>
</body>
</html>
