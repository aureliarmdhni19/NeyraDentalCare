<?php
$host = 'sql300.infinityfree.com';
$user = '	if0_41501234';
$pass = 'adithandsome123';
$dbname = 'if0_41501234_klinik';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
    // Set PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    // Tangani error dengan elegan tanpa memberitahukan password di production
    die("Koneksi database gagal. Pastikan Laragon dan MySQL berjalan, serta jalankan file database.sql di phpMyAdmin terlebih dahulu.");
}
?>
