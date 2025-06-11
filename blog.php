<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Blog | SAMARA</title>
  <link rel="stylesheet" href="css/blog.css" />
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
    <p class="fade-left" data-aos="fade-left">Home / Blog</p>
  </div>

  <!-- Blog Section -->
  <section class="blog-section">
    <div class="container">
      <h2 class="fade-up" data-aos="fade-up" data-aos-duration="800">Artikel Tentang Alam dan Lingkungan</h2>

<div class="blog-filters">
  <div class="search-bar">
    <input type="text" placeholder="Cari artikel..." />
    <button>Cari</button>
  </div>
  <div class="type-filter">
    <select>
          <option value="all">Semua Tipe</option>
          <option value="alam">Alam</option>
          <option value="lingkungan">Lingkungan</option>
          <option value="ekowisata">Ekowisata</option>
          <option value="hewan">Hewan Langka</option>  
    </select>
  </div>
</div>


      <div class="blog-posts">

        <!-- Post 1 -->
        <div class="post fade-up" data-aos="fade-up" data-aos-delay="100">
          <img src="img/gunung.png" alt="Gunung Hijau">
          <div class="post-content">
            <h3>Keindahan Gunung Hijau di Aceh</h3>
            <p>Mengenal pesona alam pegunungan hijau yang mempesona di Aceh dan potensi ekowisata yang dapat dikembangkan.</p>
            <a href="blog-detail.html" class="read-more">Read More <i class="fa-solid fa-arrow-right"></i></a>
          </div>
        </div>

        <!-- Post 2 -->
        <div class="post fade-up" data-aos="fade-up" data-aos-delay="200">
          <img src="img/pantai.jpg" alt="Pantai Bersih">
          <div class="post-content">
            <h3>Menjaga Kebersihan Pantai Kita</h3>
            <p>Langkah-langkah sederhana untuk menjaga kebersihan pantai dan mengurangi sampah plastik di laut.</p>
            <a href="blog-detail.html" class="read-more">Read More <i class="fa-solid fa-arrow-right"></i></a>
          </div>
        </div>

        <!-- Post 3 -->
        <div class="post fade-up" data-aos="fade-up" data-aos-delay="300">
          <img src="img/hutan.jpg" alt="Hutan Lestari">
          <div class="post-content">
            <h3>Pelestarian Hutan Tropis Sumatra</h3>
            <p>Peran penting hutan tropis di Sumatra dalam menjaga keseimbangan ekosistem dan keanekaragaman hayati.</p>
            <a href="blog-detail.html" class="read-more">Read More <i class="fa-solid fa-arrow-right"></i></a>
          </div>
        </div>

        <!-- Post 4 -->
        <div class="post fade-up" data-aos="fade-up" data-aos-delay="400">
          <img src="img/ekowisata.jpg" alt="Ekowisata Laut">
          <div class="post-content">
            <h3>Ekowisata Laut yang Ramah Lingkungan</h3>
            <p>Mengenal konsep ekowisata laut dan bagaimana wisatawan dapat berkontribusi pada pelestarian terumbu karang.</p>
            <a href="blog-detail.html" class="read-more">Read More <i class="fa-solid fa-arrow-right"></i></a>
          </div>
        </div>

        <!-- Post 5 -->
        <div class="post fade-up" data-aos="fade-up" data-aos-delay="500">
          <img src="img/organik.jpg" alt="Pertanian Organik">
          <div class="post-content">
            <h3>Pertanian Organik untuk Masa Depan</h3>
            <p>Manfaat pertanian organik dalam menjaga kesuburan tanah dan mendukung kesehatan manusia.</p>
            <a href="blog-detail.html" class="read-more">Read More <i class="fa-solid fa-arrow-right"></i></a>
          </div>
        </div>

        <!-- Post 6 -->
        <div class="post fade-up" data-aos="fade-up" data-aos-delay="600">
          <img src="img/plastik.jpg" alt="Sampah Plastik">
          <div class="post-content">
            <h3>Mengurangi Sampah Plastik di Sungai</h3>
            <p>Upaya nyata untuk mengurangi sampah plastik di sungai demi lingkungan yang lebih bersih dan sehat.</p>
            <a href="blog-detail.html" class="read-more">Read More <i class="fa-solid fa-arrow-right"></i></a>
          </div>
        </div>

        <!-- Post 7 -->
        <div class="post fade-up" data-aos="fade-up" data-aos-delay="700">
          <img src="img/hewanlangka.jpg" alt="Hewan Langka">
          <div class="post-content">
            <h3>Perlindungan Satwa Langka di Indonesia</h3>
            <p>Peran masyarakat dalam melindungi hewan langka seperti harimau sumatra dan badak jawa agar tidak punah.</p>
            <a href="blog-detail.html" class="read-more">Read More <i class="fa-solid fa-arrow-right"></i></a>
          </div>
        </div>

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
        <li><a href="index.html">Beranda</a></li>
        <li><a href="about.html">Tentang Kami</a></li>
        <li><a href="blog.html">Blog</a></li>
        <li><a href="contact.html">Kontak</a></li>
      </ul>
    </div>

    <!-- Kontak -->
    <div class="footer-section">
      <h4>KONTAK</h4>
      <ul>
        <li><i class="fa-solid fa-location-dot"></i> Lhokseumawe, Aceh, Indonesia</li>
        <li><i class="fa-solid fa-phone"></i> +62 813 4567 8901</li>
        <li><i class="fa-solid fa-envelope"></i> info@samara.or.id</li>
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
