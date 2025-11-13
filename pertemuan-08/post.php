<?php
session_start();

$nim = $_SESSION["nim"] ?? "2511500046";
$nama = $_SESSION["nama"] ?? "Muhammad Alfarezi";
$tempatlahir = $_SESSION["tempatlahir"] ?? "PangkalPinang";
$tanggallahir = $_SESSION["tanggallahir"] ?? "4 Agustus 2007";
$hobby = $_SESSION["hobby"] ?? "Bermain Game , Aragament musik , Bermain Instrument";
$pasangan = $_SESSION["pasangan"] ?? "Tidak ada karena kurang beruntung";
$pekerjaan = $_SESSION["pekerjaan"] ?? "Tidak ada";
$namaorangtua = $_SESSION["namaorangtua"] ?? "Ema Asmalinar dan Saanis djanan";
$kakak = $_SESSION["kakak"] ?? "Tidak ada";
$adik = $_SESSION["adik"] ?? "Tidak ada";

$sesnama = $_SESSION["sesnama"] ?? "";
$sesemail = $_SESSION["sesemail"] ?? "";
$sespesan = $_SESSION["sespesan"] ?? "";
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Entry Data Mahasiswa</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <header>
    <h1>Ini Header</h1>
    <button class="menu-toggle" id="menuToggle" aria-label="Toggle Navigation">&#9776;</button>
    <nav>
      <ul>
        <li><a href="#home">Beranda</a></li>
        <li><a href="#entrydata">Entry Data</a></li>
        <li><a href="#about">Tentang</a></li>
        <li><a href="#contact">Kontak</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <section id="home">
      <h2>Selamat Datang</h2>
      <p>Ini contoh paragraf HTML.</p>
      <?php
      echo "Halo Dunia!<br>";
      echo "Muhammad Arkan Ramadhan";
      ?>
    </section>

    <section id="entrydata">
      <h2>Entry Data Mahasiswa</h2>
      <form action="proses_data.php" method="POST">
        <label for="nim">NIM:</label>
        <input type="text" id="nim" name="nim" placeholder="Masukkan NIM" required>

        <label for="nama">Nama Lengkap:</label>
        <input type="text" id="nama" name="nama" placeholder="Masukkan nama lengkap" required>

        <label for="tempatlahir">Tempat Lahir:</label>
        <input type="text" id="tempatlahir" name="tempatlahir" placeholder="Masukkan tempat lahir" required>

        <label for="tanggallahir">Tanggal Lahir:</label>
        <input type="date" id="tanggallahir" name="tanggallahir" required>

        <label for="hobby">Hobi:</label>
        <input type="text" id="hobby" name="hobby" placeholder="Masukkan hobi" required>

        <label for="pasangan">Pasangan:</label>
        <input type="text" id="pasangan" name="pasangan" placeholder="Masukkan pasangan" required>

        <label for="pekerjaan">Pekerjaan:</label>
        <input type="text" id="pekerjaan" name="pekerjaan" placeholder="Masukkan pekerjaan" required>

        <label for="namaorangtua">Nama Orang Tua:</label>
        <input type="text" id="namaorangtua" name="namaorangtua" placeholder="Masukkan nama orang tua" required>

        <label for="kakak">Nama Kakak:</label>
        <input type="text" id="kakak" name="kakak" placeholder="Masukkan nama kakak">

        <label for="adik">Nama Adik:</label>
        <input type="text" id="adik" name="adik" placeholder="Masukkan nama adik">

        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>
      </form>
    </section>

    <section id="about">
      <h2>Tentang Saya</h2>
      <p><strong>NIM:</strong> <?= htmlspecialchars($nim) ?></p>
      <p><strong>Nama Lengkap:</strong> <?= htmlspecialchars($nama) ?></p>
      <p><strong>Tempat Lahir:</strong> <?= htmlspecialchars($tempatlahir) ?></p>
      <p><strong>Tanggal Lahir:</strong> <?= htmlspecialchars($tanggallahir) ?></p>
      <p><strong>Hobi:</strong> <?= htmlspecialchars($hobby) ?></p>
      <p><strong>Pasangan:</strong> <?= htmlspecialchars($pasangan) ?></p>
      <p><strong>Pekerjaan:</strong> <?= htmlspecialchars($pekerjaan) ?></p>
      <p><strong>Nama Orang Tua:</strong> <?= htmlspecialchars($namaorangtua) ?></p>
      <p><strong>Nama Kakak:</strong> <?= htmlspecialchars($kakak) ?></p>
      <p><strong>Nama Adik:</strong> <?= htmlspecialchars($adik) ?></p>
    </section>

    <section id="contact">
      <h2>Kontak Kami</h2>
      <form action="proses.php" method="POST">
        <label for="txtNama">Nama:</label>
        <input type="text" id="txtNama" name="txtNama" placeholder="Masukkan nama" required>

        <label for="txtEmail">Email:</label>
        <input type="email" id="txtEmail" name="txtEmail" placeholder="Masukkan email" required>

        <label for="txtPesan">Pesan Anda:</label>
        <textarea id="txtPesan" name="txtPesan" rows="4" placeholder="Tulis pesan anda..." required></textarea>

        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>
      </form>

      <?php if (!empty($sesnama)): ?>
        <br><hr>
        <h2>Yang Menghubungi Kami</h2>
        <p><strong>Nama :</strong> <?= htmlspecialchars($sesnama) ?></p>
        <p><strong>Email :</strong> <?= htmlspecialchars($sesemail) ?></p>
        <p><strong>Pesan :</strong> <?= htmlspecialchars($sespesan) ?></p>
      <?php endif; ?>
    </section>
  </main>

  <footer>
    <p>&copy; 2025 Muhammad Alfarezi [2511500046]</p>
  </footer>
</body>
</html>