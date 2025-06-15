<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="icon" href="img/icon-logo.png" type="image/x-icon" />
  <title>Contact | SAMARA</title>
  <!-- External CSS -->
  <link rel="stylesheet" href="css/contact.css" />
  <!-- FontAwesome -->
  <script src="https://kit.fontawesome.com/aa9a0b170b.js" crossorigin="anonymous"></script>
  <!-- AOS CSS -->
  <!-- <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet" /> -->
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>
     <div class="falling-leaves"></div>


  <!-- Navbar -->
<?php include 'navbar.php' ?>

  <!-- Breadcrumb -->
  <div class="penanda fade-left" data-aos="fade-down">
    <p>Home / Contact</p>
  </div>

<section id="developers">
  <div class="container">
    <h2 class="section-title fade-down">Developers</h2>
    <div class="dev-card-wrapper">

      <!-- Amirullah -->
      <div class="dev-card fade-down">
        <img src="img/amiruddin.jpeg" alt="Amirullah">
        <h3>Amirullah</h3>
        <p class="role">Front-End Developer</p>
        <p class="tagline">"Mengubah desain menjadi situs web yang indah dan responsif."</p>
        <p class="desc">
          Bersemangat dalam menciptakan pengalaman pengguna yang menarik menggunakan HTML, CSS, dan JavaScript.
          Senang mengeksplorasi framework front-end baru dan mengikuti perkembangan teknologi web modern.
        </p>

        <div class="social-links">
          <a href="https://www.tiktok.com/@amirrr_mlbb"><i class="fab fa-tiktok"></i></a>
          <a href="https://github.com/amirullah310"><i class="fab fa-github"></i></a>
          <a href="https://www.instagram.com/amir31.05"><i class="fab fa-instagram"></i></a>
        </div>
      </div>

      <!-- Al Faiz Akbar Thaib -->
      <div class="dev-card fade-down">
        <img src="img/alarm.jpeg" alt="Al Faiz Akbar Thaib">
        <h3>Al Faiz Akbar Thaib</h3>
        <p class="role">Back-End Developer</p>
        <p class="tagline">"Membangun sistem server-side yang andal dan efisien."</p>
        <p class="desc">
          Berpengalaman dalam PHP, MySQL, dan mengembangkan API yang dapat diskalakan.
          Fokus pada penulisan kode yang bersih, terstruktur, dan memastikan performa yang tinggi.
        </p>
       
        <div class="social-links">
          <a href="https://www.tiktok.com/@alfaizakbar_"><i class="fab fa-tiktok"></i></a>
          <a href="https://github.com/alfaizakbar"><i class="fab fa-github"></i></a>
          <a href="https://www.instagram.com/alfaizakbar._"><i class="fab fa-instagram"></i></a>
        </div>
      </div>

      <!-- Farid Haiqal -->
      <div class="dev-card fade-down">
        <img src="img/fardi.jpeg" alt="Farid Haiqal">
        <h3>Farid Haiqal</h3>
        <p class="role">UI/UX Designer</p>
        <p class="tagline">"Merancang pengalaman pengguna yang intuitif dan elegan."</p>
        <p class="desc">
          Mahir dalam menciptakan desain yang bersih, modern, dan mudah diakses.
          Berpengalaman dalam membuat prototipe dan bekerja sama dengan pengembang untuk mewujudkan desain.
        </p>

        <div class="social-links">
          <a href="https://www.tiktok.com/@abofared08_"><i class="fab fa-tiktok"></i></a>
          <a href="https://github.com/fared08"><i class="fab fa-github"></i></a>
          <a href="https://www.instagram.com/abofared08"><i class="fab fa-instagram"></i></a>
        </div>
      </div>
      
    </div>
  </div>

  <!-- Modal -->
  <div id="imageModal" class="modal">
      <span class="modal-close">&times;</span>
      <img class="modal-content" id="modalImage">
  </div>
</section>


  <!-- Contact Section -->
  <section id="contact-2">
    <div class="container">
      <div class="contact-wrapper">
        <!-- Info Boxes -->


        <!-- Map & Form -->
        <div class="contact-content">
          <!-- Map -->
          <div class="map fade-up" data-aos="fade-up">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15942.225679680613!2d97.1301352!3d5.1858058!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x304777687d8b3c71%3A0x8b565eab0ecf7f30!2sPoliteknik%20Negeri%20Lhokseumawe!5e0!3m2!1sid!2sid!4v1684321058961!5m2!1sid!2sid"
              frameborder="0"
              allowfullscreen=""
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>

          <!-- Contact Form -->
          <div id="contactForm" class="contact-form fade-up" data-aos="fade-up">
            <form action="https://formspree.io/f/xeokavpg" method="POST">
              <div class="form-row">
                <input type="text" name="name" placeholder="Nama Anda" required>
                <input type="email" name="email" placeholder="Email Anda" required>
              </div>
              <input type="text" name="subject" placeholder="Subjek" required>
              <textarea name="message" rows="6" placeholder="Pesan" required></textarea>
              <button type="submit">Kirim Pesan</button>
            </form>
          </div>
        </div>

                <div class="info-boxes">
          <div class="info-item fade-up" data-aos="fade-up">
            <div class="icon-circle">
              <i class="fas fa-map-marker-alt"></i>
            </div>
            <h3>Alamat</h3>
            <p>Lhokseumawe, Aceh, Indonesia</p>
          </div>
          <div class="info-item fade-up" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-circle">
              <i class="fas fa-phone"></i>
            </div>
            <h3>Telepon</h3>
            <p>+62 812 3456 7890</p>
          </div>
          <div class="info-item fade-up" data-aos="fade-up" data-aos-delay="400">
            <div class="icon-circle">
              <i class="fas fa-envelope"></i>
            </div>
            <h3>Email</h3>
            <p>contactsamaraofficial@gmail.com</p>
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
  <script>
    AOS.init();
  </script>
  <script src="script.js"></script>
</body>
</html>

