<?php
$host = "localhost";
$user = "root";
$pass = ""; // Kosongkan jika menggunakan Laragon/XAMPP default
$db   = "nama_database_anda"; // Ganti dengan nama database Anda

try {
    // Menggunakan PDO agar sesuai dengan fungsi ->prepare() di kode Anda
    $koneksi = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}
?>