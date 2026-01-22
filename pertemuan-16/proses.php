<?php
session_start();
require __DIR__ . './koneksi.php';
require_once __DIR__ . '/fungsi.php';

// --- BAGIAN 1: PROSES KONTAK KAMI ---
// Pastikan tombol di form kontak diberi name="btnKontak"
if (isset($_POST['btnKontak'])) {
    $nama    = bersihkan($_POST['txtNama'] ?? '');
    $email   = bersihkan($_POST['txtEmail'] ?? '');
    $pesan   = bersihkan($_POST['txtPesan'] ?? '');
    $captcha = bersihkan($_POST['txtCaptcha'] ?? '');

    $errors = [];
    if ($captcha !== "5") { $errors[] = "Captcha salah."; }
    // ... tambahkan validasi lainnya seperti di kode Anda ...

    if (!empty($errors)) {
        $_SESSION['flash_error'] = implode('<br>', $errors);
        redirect_ke('index.php#contact');
        exit;
    }

    $sql = "INSERT INTO tbl_tamu (cnama, cemail, cpesan) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sss", $nama, $email, $pesan);
        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['flash_sukses'] = "Pesan berhasil terkirim!";
            redirect_ke('index.php#contact');
        } else {
            $_SESSION['flash_error'] = "Gagal simpan ke database.";
            redirect_ke('index.php#contact');
        }
        mysqli_stmt_close($stmt);
    }
    exit;
}

// --- BAGIAN 2: PROSES BIODATA PENGUNJUNG ---
// Pastikan tombol di form biodata diberi name="btnBiodata"
if (isset($_POST['btnBiodata'])) {
    // Ambil data sesuai atribut 'name' di form HTML Anda
    $arrBiodata = [
        "kodepen"  => $_POST["txtKodePen"] ?? "",
        "nama"     => $_POST["txtNmPengunjung"] ?? "",
        "alamat"   => $_POST["txtAlRmh"] ?? "",
        "tanggal"  => $_POST["txtTglKunjungan"] ?? "",
        "hobi"     => $_POST["txtHobi"] ?? "",
        "slta"     => $_POST["txtAsalSMA"] ?? "",
        "pekerjaan"=> $_POST["txtKerja"] ?? "",
        "ortu"     => $_POST["txtNmOrtu"] ?? "",
        "pacar"    => $_POST["txtNmPacar"] ?? "",
        "mantan"   => $_POST["txtNmMantan"] ?? ""
    ];

    $_SESSION["biodata"] = $arrBiodata;
    
    // Alihkan ke halaman about untuk menampilkan hasilnya
    header("Location: index.php#about");
    exit;
}