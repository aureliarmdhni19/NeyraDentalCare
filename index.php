<?php
session_start();
// Jangan gunakan require_once 'db.php' secara mutlak di sini agar UI tetap load jika DB belum terbuat,
// Kita akan tangani secara mulus.
$services = [];
$db_connected = false;

try {
    $host = 'sql300.infinityfree.com';
$user = '	if0_41501234';
$pass = 'adithandsome123';
$dbname = 'if0_41501234_klinik';
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db_connected = true;

    // Fetch Services
    $stmt = $pdo->query("SELECT id, nama_layanan FROM layanan ORDER BY id ASC");
    $services = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
catch (PDOException $e) {
// DB tidak terkoneksi, tidak masalah, kita biarkan kosong.
// Nanti user akan membaca instruksi dari markdown.
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Neyra Dental Care | By Mahasiswa Terapi Gigi UNHAS</title>
    <meta name="description" content="Klinik gigi Neyra Dental Care yang modern. Dikelola oleh mahasiswa Terapi Gigi Universitas Hasanuddin (UNHAS). Layanan profesional, tempat nyaman.">
    <meta name="keywords" content="klinik gigi, dokter gigi makassar, terapi gigi unhas, scaling gigi, tambal gigi, neyra dental care">
    
    <!-- Google Fonts: Outfit (Modern Geometric Sans) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="assets/css/style.css?v=3">
</head>
<body>

    <!-- Ambient Liquid Blobs -->
    <div class="blob-container">
        <div class="blob blob-1"></div>
        <div class="blob blob-2"></div>
        <div class="blob blob-3"></div>
    </div>

    <!-- Navigation -->
    <header>
        <nav class="navbar glass-panel">
            <div class="nav-logo">
                <img src="assets/images/logoneyra.png" alt="Neyra Dental Care" style="width: 100px; height: auto;">
            </div>
            <ul class="nav-links">
                <li><a href="#beranda">Beranda</a></li>
                <li><a href="#tentang">Tentang</a></li>
                <li><a href="#layanan">Layanan</a></li>
                <li><a href="#galeri">Galeri</a></li>
                <li><a href="#tim">Tim Kami</a></li>
            </ul>
            <a href="#reservasi" class="btn">Buat Janji</a>
        </nav>
    </header>

    <!-- Hero Section -->
    <section id="beranda" class="hero">
        <div class="hero-content glass-panel">
            <span class="tag">Klinik Gigi Terpercaya</span>
            <h1>Senyum Cemerlang Dimulai Dari Sini.</h1>
            <p>Rasakan pengalaman perawatan kesehatan gigi premium dengan desain klinik yang estetik. Ditangani langsung oleh tim ahli kolaborasi dari Mahasiswa Terapi Gigi UNHAS.</p>
            <a href="#reservasi" class="btn" style="padding: 1rem 3rem; font-size: 1.1rem;">Reservasi Sekarang</a>
        </div>
    </section>

    <!-- Tentang Kami -->
    <section id="tentang">
        <h2 class="section-title">Kenapa Memilih Kami?</h2>
        <div class="tentang-kami-container">
            <div class="tentang-img">
                <img src="https://images.unsplash.com/photo-1606811841689-23dfddce3e95?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Suasana Klinik Gigi Aesthetic">
            </div>
            <div class="tentang-text glass-panel">
                <h3>Dedikasi Dari Intelektual Muda UNHAS</h3>
                <p>Kami adalah inisiatif mandiri dari Mahasiswa Program Studi Terapi Gigi Universitas Hasanuddin (UNHAS). Menggabungkan ilmu medis keperawatan gigi terkini dengan pendekatan hospitality modern.</p>
                <p>Klinik kami didesain dengan konsep <em>liquid glass aesthetic</em> untuk meminimalkan kecemasan pasien (dental anxiety), menciptakan atmosfer relaksasi tingkat tinggi selama perawatan.</p>
                <ul style="list-style-position: inside; margin-top: 1rem; color: var(--clr-text-light);">
                    <li>Sterilisasi alat berstandar operasional tinggi</li>
                    <li>Harga terjangkau untuk mahasiswa & umum</li>
                    <li>Konsultasi komprehensif edukatif</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Layanan -->
    <section id="layanan">
        <h2 class="section-title">Layanan Kami</h2>
        <div class="layanan-grid">
            <div class="layanan-card glass-panel">
                <div class="layanan-icon"><i class="fa-solid fa-stethoscope"></i></div>
                <h3>Pemeriksaan Rutin</h3>
                <p>Cegah masalah sejak dini dengan pemeriksaan rutin yang mendetail menggunakan teknologi terkini.</p>
            </div>
            <div class="layanan-card glass-panel">
                <div class="layanan-icon"><i class="fa-solid fa-wand-magic-sparkles"></i></div>
                <h3>Scaling (Pembersihan)</h3>
                <p>Menghilangkan plak dan karang gigi membandel tanpa rasa sakit berlebih.</p>
            </div>
            <div class="layanan-card glass-panel">
                <div class="layanan-icon"><i class="fa-solid fa-gem"></i></div>
                <h3>Tambal Estetik</h3>
                <p>Penambalan dengan material sewarna gigi untuk hasil yang natural dan kuat.</p>
            </div>
            <div class="layanan-card glass-panel">
                <div class="layanan-icon"><i class="fa-solid fa-tooth"></i></div>
                <h3>Pencabutan Ekstraksi</h3>
                <p>Prosedur ekstraksi aman dan minim trauma untuk gigi yang tidak bisa dipertahankan.</p>
            </div>
        </div>
    </section>

    <!-- Galeri Slider -->
    <section id="galeri" class="slider-section">
        <h2 class="section-title">Fasilitas Premium Kami</h2>
        <!-- Swiper -->
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="https://images.unsplash.com/photo-1629909613654-28e377c37b09?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Ruang Perawatan 1" />
                </div>
                <div class="swiper-slide">
                    <img src="https://images.unsplash.com/photo-1588776814546-1ffcf47267a5?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Peralatan Klinik" />
                </div>
                <div class="swiper-slide">
                    <img src="https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Ruang Tunggu" />
                </div>
                <div class="swiper-slide">
                    <img src="https://images.unsplash.com/photo-1579684385127-1ef15d508118?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Meja Resepsionis" />
                </div>
            </div>
            <div class="swiper-pagination"></div>
            <!-- Navigation -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </section>

    <!-- Info Operasional & Tim -->
    <section id="tim">
        <div class="info-flex">
            <!-- Waktu Operasional -->
            <div class="jam-operasional glass-panel">
                <h3>Jam Operasional 🕒</h3>
                <p>Kami siap melayani senyum Anda di waktu berikut:</p>
                <div class="jam-item">
                    <span>Senin - Jumat</span>
                    <strong>09:00 - 20:00</strong>
                </div>
                <div class="jam-item">
                    <span>Sabtu</span>
                    <strong>09:00 - 16:00</strong>
                </div>
                <div class="jam-item">
                    <span>Ahad / Libur</span>
                    <strong>Tutup</strong>
                </div>
            </div>
            <!-- Tim Dokter / Terapis -->
            <div class="tim glass-panel">
                <div style="flex: 1 1 100%; margin-bottom: 1rem;">
                    <h3>Tim Terapis Ahli Kami</h3>
                    <p style="font-size: 0.9rem;">Mahasiswa Terapi Gigi Terbaik UNHAS</p>
                </div>
                <div class="tim-card glass-panel">
                    <img class="tim-img" src="assets/images/juan.jpeg" alt="Juan Ibnu Alrafi">
                    <h4>Juan Ibnu Alrafi</h4>
                    <span style="font-size:0.8rem; color:var(--clr-text-light);">Supervisor Medis</span>
                </div>
                <div class="tim-card glass-panel">
                    <img class="tim-img" src="assets/images/aurel.jpeg" alt="Aurelia Ramadhani">
                    <h4>Aurelia Ramdhani</h4>
                    <span style="font-size:0.8rem; color:var(--clr-text-light);">Lead Terapis (UNHAS)</span>
                </div>
                <div class="tim-card glass-panel">
                    <img class="tim-img" src="assets/images/aisyah.jpeg" alt="Aisyah Putri Zardhani">
                    <h4>Aisyah Putri Zardhani</h4>
                    <span style="font-size:0.8rem; color:var(--clr-text-light);">Asisten Dental</span>
                </div>
                <div class="tim-card glass-panel">
                    <img class="tim-img" src="assets/images/chelsea.jpeg" alt="Chelsea Olivia">
                    <h4>Chelsea Olivia</h4>
                    <span style="font-size:0.8rem; color:var(--clr-text-light);">Asisten Dental</span>
                </div>
                <div class="tim-card glass-panel">
                    <img class="tim-img" src="assets/images/dea.jpeg" alt="Dea Kalsum Z.">
                    <h4>Dea Kalsum Z.</h4>
                    <span style="font-size:0.8rem; color:var(--clr-text-light);">Asisten Dental</span>
                </div>
                <div class="tim-card glass-panel">
                    <img class="tim-img" src="assets/images/fida.jpeg" alt="Mufidah Katrina Musfahuddin">
                    <h4>Mufidah Katrina Musfahuddin</h4>
                    <span style="font-size:0.8rem; color:var(--clr-text-light);">Asisten Dental</span>
                </div>
                <div class="tim-card glass-panel">
                    <img class="tim-img" src="assets/images/pute.jpeg" alt="Putri Anastasya">
                    <h4>Putri Anastasya</h4>
                    <span style="font-size:0.8rem; color:var(--clr-text-light);">Asisten Dental</span>
                </div>
                <div class="tim-card glass-panel">
                    <img class="tim-img" src="assets/images/vera.png" alt="Verawati">
                    <h4>Verawati</h4>
                    <span style="font-size:0.8rem; color:var(--clr-text-light);">Asisten Dental</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Reservasi & Maps -->
    <section id="reservasi">
        <h2 class="section-title">Buat Jadwal Kunjungan</h2>
        
        <div class="reservasi-container">
            <!-- Form -->
            <div class="reservasi-form glass-panel">
                <h3>Form Reservasi Online</h3>
                <p>Isi data diri Anda, kami akan segera merespons.</p>

                <?php if (isset($_SESSION['status_message'])): ?>
                    <div class="alert alert-<?php echo $_SESSION['status_type']; ?>">
                        <?php echo $_SESSION['status_message']; ?>
                    </div>
                <?php unset($_SESSION['status_message']);
    unset($_SESSION['status_type']);
endif; ?>

                <?php if (!$db_connected): ?>
                    <div class="alert alert-error">Database belum dikonfigurasi. Form dimatikan sementara. Jalankan instruksi di file Panduan.</div>
                <?php
endif; ?>

                <form action="process_reservation.php" method="POST">
                    <div class="form-group">
                        <label for="nama">Nama Lengkap *</label>
                        <input type="text" id="nama" name="nama_pasien" class="form-control" required placeholder="Cth: Andi M." <?php echo !$db_connected ? 'disabled' : ''; ?>>
                    </div>
                    <div class="form-group">
                        <label for="nohp">Nomor WhatsApp *</label>
                        <input type="tel" id="nohp" name="no_hp" class="form-control" required placeholder="Cth: 081234..." <?php echo !$db_connected ? 'disabled' : ''; ?>>
                    </div>
                    <div class="form-group">
                        <label for="layanan">Jenis Layanan</label>
                        <select id="layanan" name="layanan_id" class="form-control" <?php echo !$db_connected ? 'disabled' : ''; ?>>
                            <option value="">-- Pilih Layanan (Opsional) --</option>
                            <?php foreach ($services as $srv): ?>
                                <option value="<?php echo $srv['id']; ?>"><?php echo htmlspecialchars($srv['nama_layanan']); ?></option>
                            <?php
endforeach; ?>
                        </select>
                    </div>
                    
                    <!-- Menggunakan Flexbox untuk baris Tanggal dan Waktu -->
                    <div style="display: flex; gap: 1rem;">
                        <div class="form-group" style="flex: 1;">
                            <label for="tanggal">Tanggal *</label>
                            <input type="date" id="tanggal" name="tanggal_reservasi" class="form-control" required <?php echo !$db_connected ? 'disabled' : ''; ?>>
                        </div>
                        <div class="form-group" style="flex: 1;">
                            <label for="waktu">Waktu Prediksi *</label>
                            <input type="time" id="waktu" name="waktu_reservasi" class="form-control" required <?php echo !$db_connected ? 'disabled' : ''; ?>>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="keluhan">Keluhan Utama (Opsional)</label>
                        <textarea id="keluhan" name="keluhan" class="form-control" placeholder="Jelaskan sedikit masalah gigi Anda..." <?php echo !$db_connected ? 'disabled' : ''; ?>></textarea>
                    </div>
                    
                    <button type="submit" class="btn" style="width: 100%;" <?php echo !$db_connected ? 'disabled' : ''; ?>>Kirim Reservasi</button>
                </form>
            </div>

            <!-- Gmaps -->
            <div class="map-container">
                <!-- Frame lokasi RSGM UNHAS (Rumah Sakit Gigi dan Mulut Universitas Hasanuddin) -->
                <iframe src="https://maps.google.com/maps?q=RSGM%20Universitas%20Hasanuddin&t=&z=15&ie=UTF8&iwloc=&output=embed" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>

    <!-- Floating Social Buttons -->
    <div class="floating-socials">
        <a href="https://wa.me/6281242754349?text=Halo%20Admin%20Neyra%20Dental%20Care,%20saya%20ingin%20berkonsultasi%20mengenai%20perawatan%20gigi%20saya.%0A%0ANama:%20%0AUsia:%20%0AKeluhan:%20" target="_blank" class="float-btn wa-btn" title="Chat WhatsApp">
            <i class="fa-brands fa-whatsapp"></i>
        </a>
        <a href="https://instagram.com/aaureliee___" target="_blank" class="float-btn ig-btn" title="Kunjungi Instagram">
            <i class="fa-brands fa-instagram"></i>
        </a>
    </div>

    <!-- Footer -->
    <footer>
        <div class="footer-nav">
            <a href="#beranda">Beranda</a>
            <a href="#tentang">Tentang</a>
            <a href="#layanan">Layanan</a>
            <a href="#galeri">Galeri</a>
            <a href="#tim">Tim Kami</a>
        </div>
        <p>&copy; <?php echo date("Y"); ?> Neyra Dental Care. Dibuat dengan cinta oleh Mahasiswa Terapi Gigi UNHAS.</p>
    </footer>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    
    <!-- Custom JS -->
    <script src="assets/js/script.js"></script>
    
</body>
</html>
