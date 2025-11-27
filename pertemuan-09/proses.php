<?php
session_start();
$sesnama = $_POST["txtNama"];
$sesemail = $_POST["txtEmail"];
$sespesan = $_POST["txtPesan"];
$_SESSION["sesnama"] = $sesnama;
$_SESSION["sesemail"] = $sesemail;
$_SESSION["sespesan"] = $sespesan;

$arrBiodata = [
"nim" => $_POST["txtNim"] ?? "",
"nama" => $_POST["txtNmLengkap"] ?? "",
"tempat" => $_POST["txtT4Lhr"] ?? "",
"tanggal" => $_POST["txtTglLhr"] ?? "",
"hobi" => $_POST["txtHobi"] ?? "",
"pasangan" => $_POST["txtPasangan"] ?? "",
"pekerjaan" => $_POST["txtKerja"] ?? "",
"ortu" => $_POST["txtNmOrtu"] ?? "",
"kakak" => $_POST["txtNmKakak"] ?? "",
"adik" => $_POST["txtNmAdik"] ?? ""
];

$txtNim = $_POST["txtNim"];
$txtNmLengkap = $_POST["txtNmLengkap"];
$txtT4Lhr = $_POST["txtT4Lhr"];
$txtTglLhr = $_POST["txtTglLhr"];
$txtHobi = $_POST["txtHobi"];
$txtPasangan = $_POST["txtPasangan"];
$txtKerja = $_POST["txtKerja"];
$txtNmOrtu = $_POST["txtNmOrtu"];
$txtNmKakak = $_POST["txtNmKakak"];
$txtNmAdik = $_POST["txtNmAdik"];

$_SESSION["biodata"] = $arrBiodata;
header("location: index.php");
?>