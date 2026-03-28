CREATE DATABASE IF NOT EXISTS klinik_gigi;
USE klinik_gigi;

CREATE TABLE IF NOT EXISTS layanan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_layanan VARCHAR(100) NOT NULL,
    deskripsi TEXT
);

INSERT INTO layanan (nama_layanan, deskripsi) VALUES 
('Pemeriksaan Rutin', 'Pemeriksaan gigi menyeluruh secara rutin dengan peralatan modern'),
('Pembersihan Karang Gigi', 'Pembersihan karang gigi secara profesional (Scaling)'),
('Penambalan Gigi Astetik', 'Penambalan gigi sewarna untuk mengembalikan senyum Anda'),
('Pencabutan Gigi', 'Tindakan ekstraksi gigi dengan anestesi yang nyaman'),
('Perawatan Saluran Akar', 'Perawatan endodontik untuk gigi yang terinfeksi bakteri')
ON DUPLICATE KEY UPDATE nama_layanan=VALUES(nama_layanan), deskripsi=VALUES(deskripsi);

CREATE TABLE IF NOT EXISTS reservasi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_pasien VARCHAR(100) NOT NULL,
    no_hp VARCHAR(20) NOT NULL,
    layanan_id INT,
    tanggal_reservasi DATE NOT NULL,
    waktu_reservasi TIME NOT NULL,
    keluhan TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (layanan_id) REFERENCES layanan(id) ON DELETE SET NULL
);
