<?php
require '../database/koneksi.php';

// Ambil ID event dari parameter URL
$id_event = isset($_GET['id']) ? $_GET['id'] : '';

$query = mysqli_query($koneksi, "SELECT * FROM kegiatan WHERE id_kegiatan = '$id_event'");
$data = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title><?= $data ? $data['nama_kegiatan'] : 'Event Tidak Ditemukan' ?> | SAMARA</title>
  <link rel="stylesheet" href="../css/detail_artikel.css" />
  <script src="https://kit.fontawesome.com/aa9a0b170b.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
  <div class="falling-leaves"></div>

  <?php include 'header_navbar.php' ?>

<?php if ($data): ?>
  <div class="article-detail" style="margin-top: 100px;">
    <div class="article-header fade-down">
      <h1><?= htmlspecialchars($data['nama_kegiatan']) ?></h1>
      <div class="article-meta">
        <span class="date">Tanggal: <?= date('d F Y', strtotime($data['tanggal_kegiatan'])) ?></span>
        <span class="type">Tempat: <?= htmlspecialchars($data['tempat']) ?></span>
      </div>
    </div>

    <div class="article-image fade-down">
      <?php if (!empty($data['gambar'])): ?>
        <img src="<?= htmlspecialchars($data['gambar']) ?>" alt="<?= htmlspecialchars($data['nama_kegiatan']) ?>" />
      <?php else: ?>
        <p>Tidak ada gambar</p>
      <?php endif; ?>
    </div>

    <div class="article-content fade-down">
      <?= nl2br($data['deskripsi_kegiatan']) ?>
    </div>
    <br>
    <button class="back-button fade-down" onclick="window.history.back()">← Kembali</button>
  </div>

<?php else: ?>
  <div class="article-detail">
    <p>Event tidak ditemukan.</p>
  </div>
<?php endif; ?>

<!-- Footer -->
<footer>
  <div class="footer-container">
    <div class="footer-section">
      <img src="img/icon-logo.png" alt="Logo SAMARA" class="footer-logo">
      <p>
        SAMARA adalah organisasi yang berdedikasi untuk mendukung pelestarian alam dan mendorong kesadaran lingkungan hidup.
      </p>
      <div class="social-links">
        <a href="#"><i class="fa-brands fa-facebook"></i></a>
        <a href="#"><i class="fa-brands fa-instagram"></i></a>
        <a href="#"><i class="fa-brands fa-youtube"></i></a>
      </div>
    </div>

    <div class="footer-section">
      <h4>HALAMAN</h4>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="artikel.php">Data Artikel</a></li>
        <li><a href="tipeartikel.php">Data Tipe Artikel</a></li>
        <li><a href="event.php">Data Event</a></li>
        <li><a href="setting.php">Setting</a></li>
      </ul>
    </div>

    <div class="footer-section">
      <h4>KONTAK</h4>
      <ul>
        <li><i class="fa-solid fa-location-dot"></i> Lhokseumawe, Aceh, Indonesia</li>
        <li><i class="fa-solid fa-phone"></i> +62 812 3456 7890</li>
        <li><i class="fa-solid fa-envelope"></i> contactsamaraofficial@gmail.com</li>
      </ul>
    </div>
  </div>

  <div class="footer-bottom">
    <p>&copy; 2025 SAMARA. All rights reserved.</p>
  </div>
</footer>

<button id="backToTop" title="Kembali ke atas" aria-label="Back to top">
  <i class="fa-solid fa-arrow-up"></i>
</button>

<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init();
</script>
<script src="script.js"></script>
</body>
</html>
