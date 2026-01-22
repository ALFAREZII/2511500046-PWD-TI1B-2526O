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
  echo "Error: " . mysqli_stmt_error($stmt);
exit;
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

<?php
include 'koneksi.php';

if (isset($_POST['kirim'])) {
    // Ambil data dari form sesuai dengan atribut 'name'
    $kodepen   = $_POST['kodepen'];
    $nama      = $_POST['nama'];
    $alamat    = $_POST['alamat'];
    $tanggal   = $_POST['tanggal'];
    $hobi      = $_POST['hobi'];
    $slta      = $_POST['slta'];
    $pekerjaan = $_POST['pekerjaan'];
    $ortu      = $_POST['ortu'];
    $pacar     = $_POST['pacar'];
    $mantan    = $_POST['mantan'];

    // Query untuk memasukkan data
    $query = "INSERT INTO nama_tabel_anda (kodepen, nama, alamat, tanggal, hobi, slta, pekerjaan, ortu, pacar, mantan) 
              VALUES ('$kodepen', '$nama', '$alamat', '$tanggal', '$hobi', '$slta', '$pekerjaan', '$ortu', '$pacar', '$mantan')";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Data Berhasil Disimpan!'); window.location='index.html';</script>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}

header("location: index.php#about");
