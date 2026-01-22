<?php
session_start();
require __DIR__ . './koneksi.php';
require_once __DIR__ . '/fungsi.php';

// 1. Panggil koneksi database
include 'koneksi.php'; // Pastikan file ini ada dan terhubung ke DB

// Cek apakah tombol kirim ditekan (optional tapi disarankan)
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $sql = "INSERT INTO tabel_biodata (kodepen, nama, alamat, tanggal, hobi, slta, pekerjaan, ortu, pacar, mantan) 
            VALUES (:kodepen, :nama, :alamat, :tanggal, :hobi, :slta, :pekerjaan, :ortu, :pacar, :mantan)";
    
    $stmt = $koneksi->prepare($sql); // Baris 53 sekarang akan berfungsi
    
    // Binding data
    $stmt->execute([
        ':kodepen' => $_POST['txtKodePen'],
        ':nama'    => $_POST['txtNmPengunjung'],
        ':alamat'  => $_POST['txtAlRmh'],
        ':tanggal' => $_POST['txtTglKunjungan'],
        ':hobi'    => $_POST['txtHobi'],
        ':slta'    => $_POST['txtAsalSMA'],
        ':pekerjaan' => $_POST['txtKerja'],
        ':ortu'    => $_POST['txtNmOrtu'],
        ':pacar'   => $_POST['txtNmPacar'],
        ':mantan'  => $_POST['txtNmMantan']
    ]);

    header("location: index.php#about");
    exit();
}

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
?>