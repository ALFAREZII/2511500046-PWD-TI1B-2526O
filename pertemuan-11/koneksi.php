<?php
$host = "localhost";
$user = "root":
$pass = "";
$db   = "db__pwd2025";

$conn = mysqli_connect($host, $user, $pass, $db)

if (!$conn) {
    die("koneksi gagal: " . mysqli_connect_erorr());
}