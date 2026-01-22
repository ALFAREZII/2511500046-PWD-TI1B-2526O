<?php
session_start();
require __DIR__ . './koneksi.php';
require_once __DIR__ . '/fungsi.php';

#cek method form, hanya izinkan POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  $_SESSION['flash_error'] = 'Akses tidak valid.';
  redirect_ke('index.php#contact');
}

#ambil dan bersihkan nilai dari form
$nama  = bersihkan($_POST['txtNama']  ?? '');
$email = bersihkan($_POST['txtEmail'] ?? '');
$pesan = bersihkan($_POST['txtPesan'] ?? '');
$captcha = bersihkan($_POST['txtCaptcha'] ?? '');

#Validasi sederhana
$errors = []; #ini array untuk menampung semua error yang ada

if ($nama === '') {
  $errors[] = 'Nama wajib diisi.';
}

if ($email === '') {
  $errors[] = 'Email wajib diisi.';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $errors[] = 'Format e-mail tidak valid.';
}

if ($pesan === '') {
  $errors[] = 'Pesan wajib diisi.';
}

if ($captcha === '') {
  $errors[] = 'Pertanyaan wajib diisi.';
}

if (mb_strlen($nama) < 3) {
  $errors[] = 'Nama minimal 3 karakter.';
}

if (mb_strlen($pesan) < 10) {
  $errors[] = 'Pesan minimal 10 karakter.';
}

if ($captcha!=="5") {
  $errors[] = 'Jawaban '. $captcha.' captcha salah.';
}

/*
kondisi di bawah ini hanya dikerjakan jika ada error, 
simpan nilai lama dan pesan error, lalu redirect (konsep PRG)
*/
if (!empty($errors)) {
  $_SESSION['old'] = [
    'nama'  => $nama,
    'email' => $email,
    'pesan' => $pesan,
    'captcha' => $captcha,
  ];

  $_SESSION['flash_error'] = implode('<br>', $errors);
  redirect_ke('index.php#contact');
}

#menyiapkan query INSERT dengan prepared statement
$sql = "INSERT INTO tbl_tamu (cnama, cemail, cpesan) VALUES (?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
  #jika gagal prepare, kirim pesan error ke pengguna (tanpa detail sensitif)
  $_SESSION['flash_error'] = 'Terjadi kesalahan sistem (prepare gagal).';
  redirect_ke('index.php#contact');
}
#bind parameter dan eksekusi (s = string)
mysqli_stmt_bind_param($stmt, "sss", $nama, $email, $pesan);

if (mysqli_stmt_execute($stmt)) { #jika berhasil, kosongkan old value, beri pesan sukses
  unset($_SESSION['old']);
  $_SESSION['flash_sukses'] = 'Terima kasih, data Anda sudah tersimpan.';
  redirect_ke('index.php#contact'); #pola PRG: kembali ke form / halaman home
} else { #jika gagal, simpan kembali old value dan tampilkan error umum
  $_SESSION['old'] = [
    'nama'  => $nama,
    'email' => $email,
    'pesan' => $pesan,
    'captcha' => $captcha,
  ];
  $_SESSION['flash_error'] = 'Data gagal disimpan. Silakan coba lagi.';
  redirect_ke('index.php#contact');
}
#tutup statement
mysqli_stmt_close($stmt);

$arrBiodata = [
  "kodepen" => $_POST["txtKodePen"] ?? "",  
  "nama" => $_POST["txtNmPengunjung"] ?? "",
  "alamat" => $_POST["txtAlRmh"] ?? "",
  "tanggal" => $_POST["txtTglKunjungan"] ?? "",
  "hobi" => $_POST["txtHobi"] ?? "",
  "slta" => $_POST["txtAsalSMA"] ?? "",
  "pekerjaan" => $_POST["txtKerja"] ?? "",
  "ortu" => $_POST["txtNmOrtu"] ?? "",
  "pacar" => $_POST["txtNmPacar"] ?? "",
  "mantan" => $_POST["txtNmMantan"] ?? ""
];
$_SESSION["biodata"] = $arrBiodata;

header("location: index.php#about");

if (empty($nama) || empty($alamat)) {
        $_SESSION['pesan'] = "Nama dan Alamat wajib diisi!";
        $_SESSION['tipe']  = "error";
    } else {
        // 4. INSERT KE DATABASE
        try {
            // Sesuaikan 'nama_tabel' dengan tabel database Anda
            $sql = "INSERT INTO biodata_tabel 
                    (kodepen, nama, alamat, tanggal, hobi, slta, pekerjaan, ortu, pacar, mantan) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            
            $stmt = $koneksi->prepare($sql);
            $stmt->execute([
                $kodepen, $nama, $alamat, $tanggal, $hobi, 
                $slta, $pekerjaan, $ortu, $pacar, $mantan
            ]);

            $_SESSION['pesan'] = "Data berhasil disimpan ke Database!";
            $_SESSION['tipe']  = "success";

        } catch (PDOException $e) {
            $_SESSION['pesan'] = "Gagal menyimpan: " . $e->getMessage();
            $_SESSION['tipe']  = "error";
        }
    }

    // 5. SIMPAN KE SESSION (Agar bisa ditampilkan di halaman depan)
    $_SESSION["biodata"] = $arrBiodata;

    // 6. REDIRECT (KONSEP PRG)
    // Kode asli Anda:
    header("location: index.php#about");
    exit();

    $koneksi = mysqli_connect("localhost", "root", "", "nama_database_anda");

// 2. Sanitasi & Ambil Data (Sesuai instruksi gambar pertama untuk keamanan)
$kodepen    = mysqli_real_escape_string($koneksi, $_POST['txtKodePen'] ?? '');
$nama       = mysqli_real_escape_string($koneksi, $_POST['txtNmPengunjung'] ?? '');
$alamat     = mysqli_real_escape_string($koneksi, $_POST['txtAlRmh'] ?? '');
$tanggal    = mysqli_real_escape_string($koneksi, $_POST['txtTglKunjungan'] ?? '');
$hobi       = mysqli_real_escape_string($koneksi, $_POST['txtHobi'] ?? '');
$slta       = mysqli_real_escape_string($koneksi, $_POST['txtAsalSMA'] ?? '');
$pekerjaan  = mysqli_real_escape_string($koneksi, $_POST['txtKerja'] ?? '');
$ortu       = mysqli_real_escape_string($koneksi, $_POST['txtNmOrtu'] ?? '');
$pacar      = mysqli_real_escape_string($koneksi, $_POST['txtNmPacar'] ?? '');
$mantan     = mysqli_real_escape_string($koneksi, $_POST['txtNmMantan'] ?? '');

// 3. Query Insert ke Tabel
$query = "INSERT INTO nama_tabel_anda 
          (kodepen, nama, alamat, tanggal, hobi, slta, pekerjaan, ortu, pacar, mantan) 
          VALUES ('$kodepen', '$nama', '$alamat', '$tanggal', '$hobi', '$slta', '$pekerjaan', '$ortu', '$pacar', '$mantan')";

$simpan = mysqli_query($koneksi, $query);

// 4. Logika Pesan (Agar tidak muncul "Gagal Disimpan")
if ($simpan) {
    $_SESSION['pesan_status'] = "Data berhasil disimpan!";
} else {
    $_SESSION['pesan_status'] = "Data gagal disimpan: " . mysqli_error($koneksi);
}

?>