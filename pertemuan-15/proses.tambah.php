<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim = htmlspecialchars($_POST['nim']); // Sanitasi
    $nama = htmlspecialchars($_POST['nama']);

    $query = "INSERT INTO mahasiswa (nim, nama) VALUES ('$nim', '$nama')";
    if (mysqli_query($conn, $query)) {
        // Konsep PRG: Redirect ke halaman tampil data
        header("Location: tampil_data.php?status=sukses");
        exit();
    }
}