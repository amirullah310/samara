<?php
require './database/koneksi.php';

// Ambil ID artikel dari parameter URL
$id_artikel = isset($_GET['id']) ? $_GET['id'] : '';

$query = mysqli_query($koneksi, "
    SELECT a.*, t.nama_tipe, ad.nama_admin 
    FROM artikel a 
    LEFT JOIN tipe_artikel t ON a.id_tipe = t.id_tipe 
    LEFT JOIN admin ad ON a.id_admin = ad.id_admin 
    WHERE a.id_artikel = '$id_artikel'
");

$data = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title><?= $data ? $data['judul'] : 'Artikel Tidak Ditemukan' ?> | SAMARA</title>
  <link rel="icon" href="img/icon-logo.png" type="image/x-icon" />
  <link rel="stylesheet" href="css/blog-detail.css" />
  <script src="https://kit.fontawesome.com/aa9a0b170b.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
  <div class="falling-leaves"></div>

  <!-- Navbar -->
  <?php include 'navbar.php' ?>

  <!-- Breadcrumb -->
  <div class="penanda">
    <p class="fade-left" data-aos="fade-left">Home / Blog Detail</p>
  </div>

<?php if ($data): ?>
  <div class="article-detail">
    <div class="article-header fade-down">
      <h1><?= htmlspecialchars($data['judul']) ?></h1>
      <div class="article-meta">
        <span class="author">Oleh: <?= htmlspecialchars($data['nama_admin']) ?></span>
        <span class="date">Diterbitkan: <?= date('d F Y', strtotime($data['tanggal_publish'])) ?></span>
        <span class="type">Tipe: <?= htmlspecialchars($data['nama_tipe']) ?></span>
      </div>
    </div>

    <div class="article-image fade-down">
      <img src="<?= htmlspecialchars($data['gambar']) ?>" alt="<?= htmlspecialchars($data['judul']) ?>" />
    </div>

    <div class="article-content fade-down">
      <?= nl2br($data['isi']) ?>
    </div>
</br>
    <button class="back-button fade-down" onclick="window.history.back()">← Kembali</button>
  </div>

<?php else: ?>
  <div class="article-detail">
    <p>Artikel tidak ditemukan.</p>
  </div>
<?php endif; ?>

<!-- Footer -->
<footer>
  <div class="footer-container">
    <!-- Logo & Deskripsi -->
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

    <!-- Halaman -->
    <div class="footer-section">
      <h4>HALAMAN</h4>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="blog.php">Artikel</a></li>
        <li><a href="contact.php">Contact</a></li>
      </ul>
    </div>

    <!-- Kontak -->
    <div class="footer-section">
      <h4>KONTAK</h4>
      <ul>
        <li><i class="fa-solid fa-location-dot"></i> Lhokseumawe, Aceh, Indonesia</li>
        <li><i class="fa-solid fa-phone"></i> +62 812 3456 7890</li>
        <li><i class="fa-solid fa-envelope"></i> contactsamaraofficial@gmail.com</li>
      </ul>
    </div>
  </div>

  <!-- Hak Cipta -->
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
