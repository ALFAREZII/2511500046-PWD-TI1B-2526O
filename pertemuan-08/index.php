<?php
session_start();

$sesnama = "";
if (isset($_SESSION["sesnama"])):
  $sesnama = $_SESSION["sesnama"];
endif;

$sesemail = "";
if (isset($_SESSION["sesemail"])):
  $sesemail = $_SESSION["sesemail"];
endif;

$sespesan = "";
if (isset($_SESSION["sespesan"])):
  $sespesan = $_SESSION["sespesan"];
endif;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Judul Halaman</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <header>
    <h1>Ini Header</h1>
    <button class="menu-toggle" id="menuToggle" aria-label="Toggle Navigation">
      &#9776;
    </button>
    <nav>
      <ul>
        <li><a href="#home">Beranda</a></li>
        <li><a href="#about">Tentang</a></li>
        <li><a href="#contact">Kontak</a></li>
        <li><a href="#entry">Entry Data Mahasiswa</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <section id="home">
      <h2>Selamat Datang</h2>
      <?php
      echo "halo dunia!<br>";
      echo "nama saya Muhammad Alfarezi";
      ?>
      <p>Ini contoh paragraf HTML.</p>
    </section>
    <section id="entry">
       <h2>Entry Data Mahasiswa</h2>
         <label for="txtNama"><span>NIM:</span>
          <input type="text" id="txtNIM" name="txtNIM" placeholder="Masukkan NIM" required autocomplete="name">
        </label>

        <label for="text"><span>Nama Lengkap:</span>
          <input type="text" id="txtNama" name="txtNama" placeholder="Masukkan Nama Lengkap" required autocomplete="email">
        </label>

        <label for="text"><span>Tempat Lahir:</span>
          <input type="text" id="txtTempatLahir" name="txtTempatLahir" placeholder="Masukkan Tempat Lahir" required autocomplete="email">
        </label>
        
          <label for="text"><span>Tanggal Lahir:</span>
          <input type="text" id="txtTanggalLahir" name="txtTanggalLahir" placeholder="Masukkan Tanggal Lahir" required autocomplete="email">
        </label>

          <label for="text"><span>Hobi:</span>
          <input type="text" id="txtHobi" name="txtHobi" placeholder="Masukkan Hobi" required autocomplete="email">
        </label>

          <label for="text"><span>Pasangan:</span>
          <input type="text" id="txtPasangan" name="txtPasangan" placeholder="Masukkan Pasangan" required autocomplete="email">
        </label>

         <label for="text"><span>Pekerjaan:</span>
          <input type="text" id="txtPekerjaan" name="txtPekerjaan" placeholder="Masukkan Pekerjaan" required autocomplete="email">
        </label>

         <label for="text"><span>Nama Orang Tua:</span>
          <input type="text" id="txtNamaortu" name="txtNamaortu" placeholder="Masukkan Nama Orang Tua" required autocomplete="email">
        </label>

        <label for="text"><span>Nama Kakak:</span>
          <input type="text" id="txtNamaKakak" name="txtNamaKakak" placeholder="Masukkan Nama Kakak" required autocomplete="email">
        </label>

        <label for="text"><span>Nama Adik:</span>
          <input type="text" id="txtNamaAdik" name="txtNamaAdik" placeholder="Masukkan Nama Adik" required autocomplete="email">
        </label>

         <button type="submit">Kirim</button>
        <button type="reset">Batal</button>
      </form>
</section>

    <section id="about">
      <?php
      $nim = 2511500010;
      $NIM = '2511500046';
      $nama = "Muhammad Alfarezi";
      $Nama = 'Muhammad Alfarezi';
      $tempat = "PangkalPinang";
      ?>
      <h2>Tentang Saya</h2>
      <p><strong>NIM:</strong>
        <?php
        echo $NIM;
        ?>
      </p>
      <p><strong>Nama Lengkap:</strong>
        <?php
        echo $Nama;
        ?> &#128526;
      </p>
      <p><strong>Tempat Lahir:</strong> <?php echo $tempat; ?></p>
      <p><strong>Tanggal Lahir:</strong> 4 Agustus 2007</p>
      <p><strong>Hobi:</strong> Bermain Game , Aragement Musik , Bermain Instrument &#127926;</p>
      <p><strong>Pasangan:</strong> Belum ada karena belum sigma &hearts;</p>
      <p><strong>Pekerjaan:</strong> Tidak ada</p>
      <p><strong>Nama Orang Tua:</strong> Ema Asmalinar dan Saanis Djanan</p>
      <p><strong>Nama Kakak:</strong> Tidak Ada</p>
      <p><strong>Nama Adik:</strong> <?php echo $sespesan ?></p>
    </section>

    <section id="contact">
      <h2>Kontak Kami</h2>
      <form action="proses.php" method="POST">

        <label for="txtNama"><span>Nama:</span>
          <input type="text" id="txtNama" name="txtNama" placeholder="Masukkan nama" required autocomplete="name">
        </label>

        <label for="txtEmail"><span>Email:</span>
          <input type="email" id="txtEmail" name="txtEmail" placeholder="Masukkan email" required autocomplete="email">
        </label>

        <label for="txtPesan"><span>Pesan Anda:</span>
          <textarea id="txtPesan" name="txtPesan" rows="4" placeholder="Tulis pesan anda..." required></textarea>
          <small id="charCount">0/200 karakter</small>
        </label>


        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>
      </form>

      <?php if (!empty($sesnama)): ?>
        <br><hr>
        <h2>Yang menghubungi kami</h2>
        <p><strong>Nama :</strong> <?php echo $sesnama ?></p>
        <p><strong>Email :</strong> <?php echo $sesemail ?></p>
        <p><strong>Pesan :</strong> <?php echo $sespesan ?></p>
      <?php endif; ?>



    </section>
  </main>

  <footer>
    <p>&copy; 2025 Muhammad Alfarezi [2511500046]</p>
  </footer>

  <script src="script.js"></script>
</body>

</html>