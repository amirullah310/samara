<?php
require './database/koneksi.php';

$sql = "SELECT * FROM kegiatan ORDER BY tanggal_kegiatan DESC";
$result = $koneksi->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Home | SAMARA</title>
    
    <!-- Style CSS eksternal -->
    <link rel="stylesheet" href="css/style.css" />

    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/aa9a0b170b.js" crossorigin="anonymous"></script>

    <!-- AOS CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet" /> -->

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">



</head>
<body class="">

    
     <div class="falling-leaves"></div>

  <!-- <div class="loader">
    <img src="img/icon-logo.png" alt="">
    <div class="jimu-primary-loading"></div>
  </div> -->
  <!-- Konten lainnya -->


<?php include 'navbar.php' ?>

<section class="hero">
  <div class="hero-left fade-right" data-aos="fade-right" data-aos-duration="1200">
    <div class="hero-title">
        <div class="title-line">
            <span class="highlight">S</span>ahabat<span class="highlight"> A</span>lam dan
         <span class="highlight">Ma</span>nusia<span class="highlight"> Ra</span>mah Lingkungan
        </div>
    </div>
    <a href="about.html"><button class="cta-button">Pelajari Lebih Lanjut</button></a>
  </div>
  <div class="hero-right fade-left" data-aos="fade-left" data-aos-duration="1200" data-aos-parallax="true">
    <img class="img-home" src="img/gambar-1.png" alt="Ilustrasi Alam">
  </div>
</section>

<!-- About Section -->
<section class="about-section">
  <div class="about-container">
    <div class="about-image fade-left" data-aos="fade-left" data-aos-duration="1200">
      <img src="img/gambar-2.png" alt="Ilustrasi Alam">
    </div>
    <div class="about-text fade-right" data-aos="fade-right" data-aos-duration="1200">
      <h2>TENTANG</h2>
      <p>
        Kami berkomitmen untuk mengedukasi dan menginspirasi tindakan nyata dalam menjaga kelestarian lingkungan demi bumi yang lebih sehat. Melalui program, kampanye, dan aksi nyata, kami mengajak setiap individu untuk menjadi bagian dari perubahan positif.
        <br><br>
        Dengan semangat kolaborasi, kami percaya bahwa setiap langkah kecil yang kita ambil akan berdampak besar bagi bumi. Bersama-sama, mari kita wujudkan masa depan yang hijau, lestari, dan ramah lingkungan.
      </p>
      <!-- <button class="about-btn" >Pelajari Lebih Lanjut</button> -->
    </div>
  </div>
</section>


<section class="tips-section">
  <div class="tips-header">
    <h2 class="tips-title" data-aos="fade-down" data-aos-duration="1000">
      Tips Gaya Hidup Ramah Lingkungan
    </h2>
    <p class="tips-subtitle" data-aos="fade-down" data-aos-duration="1200">
      Jadilah bagian dari solusi! Berikut adalah beberapa langkah kecil yang dapat membuat dampak besar untuk bumi kita.
    </p>
  </div>

  <div class="tips-container">
    <div class="tips-item" data-aos="fade-up" data-aos-duration="1000">
      <div class="tips-icon-wrapper">
        <img src="img/recycle-symbol 1.png" alt="Reduce Single-Use Plastics" class="tips-icon">
      </div>
      <h3 class="tips-item-title">Kurangi Pemakaian Plastik Sekali Pakai</h3>
      <p class="tips-item-desc">
        Bawa tas belanja sendiri, gunakan botol minum yang dapat digunakan ulang, dan hindari produk dengan kemasan berlebihan.
      </p>
    </div>

    <div class="tips-item" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
      <div class="tips-icon-wrapper">
        <img src="img/green-energy 1.png" alt="Save Electricity" class="tips-icon">
      </div>
      <h3 class="tips-item-title">Hemat Energi Listrik</h3>
      <p class="tips-item-desc">
        Matikan lampu saat tidak digunakan, gunakan lampu LED hemat energi, dan cabut charger saat tidak digunakan.
      </p>
    </div>

    <div class="tips-item" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
      <div class="tips-icon-wrapper">
        <img src="img/christmas-tree 1.png" alt="Plant Trees" class="tips-icon">
      </div>
      <h3 class="tips-item-title">Tanam Pohon di Sekitar</h3>
      <p class="tips-item-desc">
        Ikut serta dalam program penghijauan di lingkungan sekitar untuk menyerap karbon dan menciptakan udara bersih.
      </p>
    </div>

    <div class="tips-item" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600">
      <div class="tips-icon-wrapper">
        <img src="img/oceans-day.png" alt="Save Water" class="tips-icon">
      </div>
      <h3 class="tips-item-title">Hemat Penggunaan Air</h3>
      <p class="tips-item-desc">
        Gunakan air seperlunya, perbaiki keran yang bocor, dan gunakan shower hemat air.
      </p>
    </div>

    <div class="tips-item" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="800">
      <div class="tips-icon-wrapper">
        <img src="img/electric-car.png" alt="Use Eco-friendly Transport" class="tips-icon">
      </div>
      <h3 class="tips-item-title">Gunakan Transportasi Ramah Lingkungan</h3>
      <p class="tips-item-desc">
        Pilih berjalan kaki, bersepeda, atau menggunakan transportasi umum untuk mengurangi polusi.
      </p>
    </div>

    <div class="tips-item" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="1000">
      <div class="tips-icon-wrapper">
        <img src="img/fertilizer.png" alt="Make Compost" class="tips-icon">
      </div>
      <h3 class="tips-item-title">Buat Kompos dari Sampah Organik</h3>
      <p class="tips-item-desc">
        Kelola sampah organik di rumah dengan komposting untuk mengurangi limbah dan memperkaya tanah.
      </p>
    </div>
  </div>

  <!-- <div class="tips-cta" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="1200">
    <a href="contact.html" class="tips-btn">Gabung Gerakan Hijau</a>
  </div> -->
</section>


<section class="events-section">
  <div class="container">
    <h2 class="section-title" data-aos="fade-up" data-aos-duration="1000">Event Mendatang</h2>
    <div class="events-grid">
        <?php
            if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
            // Ubah tanggal ke format hari & bulan
            $tanggal = date("d", strtotime($row["tanggal_kegiatan"]));
            $bulan   = strtoupper(date("M", strtotime($row["tanggal_kegiatan"])));

            // Potong deskripsi hanya beberapa karakter
        $preview = substr(strip_tags($row["deskripsi_kegiatan"]), 0, 120) . "...";

        echo '<article class="event-card fade-up" data-aos="fade-up" data-aos-duration="1000">
        <div class="event-date">
          <span class="event-day">' . $tanggal . '</span>
          <span class="event-month">' . $bulan . '</span>
        </div>
        <div class="event-details">
          <h3 class="event-title">' . htmlspecialchars($row["nama_kegiatan"]) . '</h3>
          <p class="event-description">' . htmlspecialchars($preview) . '</p>
          <a href="event-detail.php?id=' . urlencode($row["id_kegiatan"]) . '" class="event-link" aria-label="Detail ' . htmlspecialchars($row["nama_kegiatan"]) . '">
        Selengkapnya <i class="fa-solid fa-arrow-right"></i>
          </a>
        </div>
      </article>';
              }
            } else {
              echo "<p>Tidak ada kegiatan yang tersedia.</p>";
            }
            $koneksi->close();
?>
    </div>
  </div>
</section>



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


    <!-- AOS JS -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

<script src="script.js"></script>

</body>
</html>
