<?php
session_start();
require __DIR__ . './koneksi.php';
require_once __DIR__ . '/fungsi.php';

session_start();
// 1. Panggil koneksi database
include 'koneksi.php'; // Pastikan file ini ada dan terhubung ke DB

// Cek apakah tombol kirim ditekan (optional tapi disarankan)
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 2. SANITASI DATA (PENTING!)
    // Ubah $_POST langsung menjadi variabel yang sudah dibersihkan
    // htmlspecialchars mencegah kode HTML/Script berbahaya masuk (XSS)
    $kodepen    = htmlspecialchars($_POST['txtKodePen'] ?? '');
    $nama       = htmlspecialchars($_POST['txtNmPengunjung'] ?? '');
    $alamat     = htmlspecialchars($_POST['txtAlRmh'] ?? '');
    $tanggal    = htmlspecialchars($_POST['txtTglKunjungan'] ?? '');
    $hobi       = htmlspecialchars($_POST['txtHobi'] ?? '');
    $slta       = htmlspecialchars($_POST['txtAsalSMA'] ?? '');
    $pekerjaan  = htmlspecialchars($_POST['txtKerja'] ?? '');
    $ortu       = htmlspecialchars($_POST['txtNmOrtu'] ?? '');
    $pacar      = htmlspecialchars($_POST['txtNmPacar'] ?? '');
    $mantan     = htmlspecialchars($_POST['txtNmMantan'] ?? '');

    // Masukkan data bersih ke array (seperti kode Anda)
    $arrBiodata = [
        "kodepen"   => $kodepen,
        "nama"      => $nama,
        "alamat"    => $alamat,
        "tanggal"   => $tanggal,
        "hobi"      => $hobi,
        "slta"      => $slta,
        "pekerjaan" => $pekerjaan,
        "ortu"      => $ortu,
        "pacar"     => $pacar,
        "mantan"    => $mantan
    ];

    // 3. VALIDASI SEDERHANA
    // Contoh: Nama tidak boleh kosong
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
}
?>