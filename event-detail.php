<?php
require './database/koneksi.php';

if (isset($_GET['id'])) {
  $id = $koneksi->real_escape_string($_GET['id']); // Hapus intval, gunakan escape string
  $sql = "SELECT * FROM kegiatan WHERE id_kegiatan = '$id'";
  $result = $koneksi->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Blog | SAMARA</title>
  <link rel="stylesheet" href="css/event-detail.css" />
  <script src="https://kit.fontawesome.com/aa9a0b170b.js" crossorigin="anonymous"></script>
  <!-- <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet" /> -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
     <div class="falling-leaves"></div>


  <!-- Navbar -->
<?php include 'navbar.php' ?>

  <!-- Breadcrumb -->
  <div class="penanda">
    <p class="fade-left" data-aos="fade-left">Home / Event Detail</p>
  </div>

  <?php

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $tanggal = date("d", strtotime($row["tanggal_kegiatan"]));
        $bulan   = ucfirst(strtolower(date("M", strtotime($row["tanggal_kegiatan"])))); // Misalnya 'Jul'
        $judul   = htmlspecialchars($row["nama_kegiatan"]);
        // $tipe    = htmlspecialchars($row["tipe_kegiatan"]);
        $deskripsi = nl2br(htmlspecialchars($row["deskripsi_kegiatan"]));

        // Gambar default jika tidak tersedia
        $thumbnail = !empty($row["thumbnail"]) ? htmlspecialchars($row["thumbnail"]) : 'img/default.jpg';

        echo '
        <div class="event-detail-container">
          <div class="event-detail-header fade-down">
            <div class="event-date">
              <span class="day">' . $tanggal . '</span>
              <span class="month">' . $bulan . '</span>
            </div>
            <div class="event-title">
              <h1>' . $judul . '</h1>
              </div>
              </div>
              <div class="event-image fade-down">
              <img src="' . $thumbnail . '" alt="' . $judul . '">
              </div>
              <div class="event-description fade-down">
              ' . $deskripsi . '
              </div>
              </br>
              <button class="back-button fade-down" onclick="window.history.back()">← Kembali</button>
              </div>';
            } else {
              echo "<p>Kegiatan tidak ditemukan.</p>";
            }
          } else {
            echo "<p>ID kegiatan tidak tersedia.</p>";
          }
          ?>




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

<!-- <p class="event-type">Tipe: ' . $tipe . '</p> -->