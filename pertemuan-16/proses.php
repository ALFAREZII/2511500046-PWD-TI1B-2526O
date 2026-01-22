<?php
session_start();
include "koneksi.php"; // Pastikan file ini ada

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // --- SANITASI & VALIDASI ---
    $nama      = htmlspecialchars($_POST['txtNmPengunjung'] ?? '');
    $alamat    = htmlspecialchars($_POST['txtAlRmh'] ?? '');
    $tgl_input = $_POST['txtTglKunjungan'] ?? '';

    // FIX TANGGAL: Mengubah format 1/1/2022 menjadi 2022-01-01 (image_8f500d.png)
    $tgl_fixed = date('Y-m-d', strtotime(str_replace('/', '-', $tgl_input)));

    try {
        // --- INSERT KE TABEL ---
        $sql = "INSERT INTO tabel_biodata (kodepen, nama, alamat, tanggal, hobi, slta, pekerjaan, ortu, pacar, mantan) 
                VALUES (:kodepen, :nama, :alamat, :tanggal, :hobi, :slta, :pekerjaan, :ortu, :pacar, :mantan)";
        
        $stmt = $koneksi->prepare($sql); // Baris 53 (image_8f6389.png)
        $stmt->execute([
            ':kodepen'   => $_POST['txtKodePen'],
            ':nama'      => $nama,
            ':alamat'    => $alamat,
            ':tanggal'   => $tgl_fixed, // Gunakan tanggal yang sudah diperbaiki
            ':hobi'      => $_POST['txtHobi'],
            ':slta'      => $_POST['txtAsalSMA'],
            ':pekerjaan' => $_POST['txtKerja'],
            ':ortu'      => $_POST['txtNmOrtu'],
            ':pacar'     => $_POST['txtNmPacar'],
            ':mantan'    => $_POST['txtNmMantan']
        ]);

        $_SESSION['pesan'] = "Data berhasil disimpan!";
    } catch (PDOException $e) {
        $_SESSION['pesan'] = "Gagal menyimpan: " . $e->getMessage();
    }

    // --- KONSEP PRG (Redirect) ---
    header("location: index.php#about"); // (image_8fd00e.png)
    exit();
}