<?php
require './database/koneksi.php';

// Tangkap parameter pencarian
$keyword = isset($_GET['q']) ? $_GET['q'] : '';
$tipe = isset($_GET['tipe']) ? $_GET['tipe'] : '';

// Escaping input
$keyword_escaped = $koneksi->real_escape_string($keyword);
$tipe_escaped = $koneksi->real_escape_string($tipe);

// Query dinamis
$query = "SELECT * FROM artikel WHERE 1";

if (!empty($keyword)) {
  $query .= " AND (judul LIKE '%$keyword_escaped%' OR isi LIKE '%$keyword_escaped%')";
}
if (!empty($tipe)) {
  $query .= " AND id_tipe = '$tipe_escaped'";
}

$query .= " ORDER BY tanggal_publish DESC";
$result = $koneksi->query($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Blog | SAMARA</title>
  <link rel="stylesheet" href="css/blog.css" />
  <script src="https://kit.fontawesome.com/aa9a0b170b.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
  <div class="falling-leaves"></div>

  <?php include 'navbar.php'; ?>

  <div class="penanda">
    <p class="fade-left" data-aos="fade-left">Home / Blog</p>
  </div>

  <section class="blog-section">
    <div class="container">
      <h2 class="fade-up" data-aos="fade-up" data-aos-duration="800">Artikel Tentang Alam dan Lingkungan</h2>

      <div class="blog-filters fade-down">
  <form action="blog.php" method="GET" class="search-filter-form">
    <div class="search-bar">
      <input type="text" name="q" value="<?= htmlspecialchars($keyword) ?>" placeholder="Cari artikel..." />
      <button type="submit">Cari</button>
    </div>

    <div class="type-filter">
      <select name="tipe">
        <option value="">Semua Tipe</option>
        <option value="TP0001" <?= ($tipe == 'TP0001') ? 'selected' : '' ?>>Alam</option>
        <option value="TP0002" <?= ($tipe == 'TP0002') ? 'selected' : '' ?>>Lingkungan</option>
        <option value="TP0003" <?= ($tipe == 'TP0003') ? 'selected' : '' ?>>Ekowisata</option>
        <option value="TP0004" <?= ($tipe == 'TP0004') ? 'selected' : '' ?>>Hewan Langka</option>
      </select>
    </div>
  </form>
</div>


<div class="blog-posts">
  <?php
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $judul = htmlspecialchars($row['judul']);
      $deskripsi = htmlspecialchars($row['deskripsi_singkat']);
      $gambar = !empty($row['gambar']) ? $row['gambar'] : 'img/default.jpg';
      $id_artikel = urlencode($row['id_artikel']);

      echo '
      <div class="post fade-up" data-aos="fade-up" data-aos-delay="100">
        <img src="' . $gambar . '" alt="' . $judul . '">
        <div class="post-content">
          <h3>' . $judul . '</h3>
          <p>' . $deskripsi . '</p>
          <a href="blog-detail.php?id=' . $id_artikel . '" class="read-more">Read More <i class="fa-solid fa-arrow-right"></i></a>
        </div>
      </div>';
    }
  } else {
    echo "<p>Tidak ada artikel ditemukan";
    if ($keyword) echo " untuk kata kunci '<strong>" . htmlspecialchars($keyword) . "</strong>'";
    if ($tipe) echo " dan tipe yang dipilih";
    echo ".</p>";
  }
  ?>
</div>

    </div>
  </section>

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
  <script>AOS.init();</script>
  <script src="script.js"></script>
</body>
</html>
