<?php
session_start();
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = trim($_POST['nama_pasien'] ?? '');
    $no_hp = trim($_POST['no_hp'] ?? '');
    $layanan_id = trim($_POST['layanan_id'] ?? '');
    $tanggal = trim($_POST['tanggal_reservasi'] ?? '');
    $waktu = trim($_POST['waktu_reservasi'] ?? '');
    $keluhan = trim($_POST['keluhan'] ?? '');

    // Validasi basic server-side
    if (empty($nama) || empty($no_hp) || empty($tanggal) || empty($waktu)) {
        $_SESSION['status_message'] = "Gagal: Mohon lengkapi semua field yang berbintang (*).";
        $_SESSION['status_type'] = "error";
        header("Location: index.php#reservasi");
        exit;
    }

    try {
        $stmt = $pdo->prepare("INSERT INTO reservasi (nama_pasien, no_hp, layanan_id, tanggal_reservasi, waktu_reservasi, keluhan) VALUES (?, ?, ?, ?, ?, ?)");
        
        $layanan_val = !empty($layanan_id) ? $layanan_id : null;

        $stmt->execute([$nama, $no_hp, $layanan_val, $tanggal, $waktu, $keluhan]);
        
        $_SESSION['status_message'] = "Berhasil: Reservasi Anda telah terdaftar! Staf kami akan menghubungi Anda segera.";
        $_SESSION['status_type'] = "success";
    } catch (PDOException $e) {
        $_SESSION['status_message'] = "Error Sistem: Terjadi masalah saat menyimpan data. Hubungi admin klinik.";
        $_SESSION['status_type'] = "error";
    }

    header("Location: index.php#reservasi");
    exit;
} else {
    header("Location: index.php");
    exit;
}
?>
