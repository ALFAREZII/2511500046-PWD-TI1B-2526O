<!DOCTYPE html>
<html>
<head>
    <title>Belajar PHP Dasar</title>
</head>
<body>
    <h1><?php echo "Halo,Dunia PHP!"; ?></h1>
</body>
</html>

<?php
$nama = Muhammad Alfarezi
$umur = 18;
$tinggi = 1.69
$aktif = true;

echo "Nama: $nama <br>";
echo "Umur: $umur tahun <br>";
echo "Tinggi: $tinggi meter <br>";
echo "Status aktif: " . ($aktif ? "Ya" : "Tidak") . "<br>";
var_dump($nama);
var_dump($umur);
var_dump($tinggi);
var_dump($aktif);
?>

<?php
$nama = "Muhammad Alfarezi";
$umur = 18;
$tinggi = 1.69;
$aktif = true;
$hobi = ["Bermain Game", "Aragemen Musik", "Bermain Instrument"];
$mahasiswa = (object)[
"nim" => "2511500046",
"nama" => "Muhammad Alfarezi",
"prodi" => "Teknik Informatika"
];
$nilai_akhir = NULL;
echo "<h2>Demo Tipe Data PHP</h2>";
echo "<pre>";
echo "String:\n";
var_dump($nama);
echo "\nInteger:\n";
var_dump($umur);
echo "\nFloat:\n";
var_dump($tinggi);
echo "\nBoolean:\n";
var_dump($aktif);
echo "\nArray:\n";
var_dump($hobi);
echo "\nObject:\n";
var_dump($mahasiswa);
echo "\nNULL:\n";
var_dump($nilai_akhir);
echo "</pre>";
?>

<?php
define("KAMPUS", "ISB Atma Luhur");
const ANGKATAN = 2025;
echo "Kampus: " . KAMPUS . "<br>";
echo "Angkatan: " . ANGKATAN;
?>

<?php
// Ini komentar 1 baris
# Ini juga komentar 1 baris
/*
Ini komentar
lebih dari satu baris
*/
?>

<?php
$a = 10;
$b = 3;
echo $a + $b;
echo $a % $b;
?>

<?php
$a = 100;
$b = "100";
$c = 0;
$d = false;
echo "<h3>Perbandingan == dan ===</h3>";
echo "\$a == \$b : "; var_dump($a == $b);
echo "\$a === \$b : "; var_dump($a === $b);
echo "\$c == \$d : "; var_dump($c == $d);
echo "\$c === \$d : "; var_dump($c === $d);
?>

<?php
$nilai = 80;
if ($nilai >= 90) {
echo "A";
} elseif ($nilai >= 80) {
echo "B";
} else {
echo "C";
}
?>

<?php
$hari = "Senin";
switch ($hari) {
case "Senin": echo "Awal Minggu!"; break;
case "Jumat": echo "Hampir weekend!"; break;
default: echo "Hari biasa.";
}
?>

<?php
$hobi = ["Coding", "Memasak", "Musik"];
foreach ($hobi as $item) {
echo "Hobi: $item <br>";
}
?>

<?php
$hobi = ["Coding", "Memasak", "Musik", "Membaca", "Traveling"];
echo "<h3>Daftar Hobi Saya:</h3>";
for ($i = 0; $i < count($hobi); $i++) {
echo ($i + 1) . ". " . $hobi[$i] . "<br>";
}

echo "<hr>";
echo "<h4>Hasil print_r():</h4>";
echo "<pre>";
print_r($hobi);
echo "</pre>";
echo "<h4>Hasil var_dump():</h4>";
echo "<pre>";
var_dump($hobi);
echo "</pre>";
?>

<?php
for ($i=1; $i<=5; $i++) {
echo "Perulangan ke-$i <br>";
}
?>

<?php
$i = 1;
do {
echo "Iterasi ke-$i<br>";
$i++;
} while (1 == 1);
?>