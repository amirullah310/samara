<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Pengaturan Akun</title>
  <link rel="stylesheet" href="css/setting.css?<?php echo time(); ?>" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/aa9a0b170b.js" crossorigin="anonymous"></script>

  <style>
    <?php include 'css/setting.css'; ?>
  </style>
</head>
<body>
     <div class="falling-leaves"></div>

  <?php include 'header_navbar.php'; ?>

  <div class="setting-container">
    <h1 class="setting-heading">Pengaturan Akun</h1>

    <div class="setting-content">
      <form action="" method="post" class="form-akun">
        <div class="form-section">
          <div class="form-header">
            <img src="https://cdn.iconscout.com/icon/free/png-128/person-1780867-1514182.png" alt="Profile" />
            <h2>Informasi Akun</h2>
          </div>

          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Masukkan Username" required />
          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Masukkan Email" required />
          </div>

          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="inputPassword" name="password" placeholder="Masukkan Password" required />
          </div>

          <div class="form-group checkbox-group">
            <input type="checkbox" onclick="togglePassword()" />
            <label>Tampilkan Password</label>
          </div>

          <button class="btn-submit" type="submit" name="submit">
            <i class="fa-solid fa-save"></i> Simpan Perubahan
          </button>
        </div>
      </form>
    </div>
  </div>

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


  <script>
    function togglePassword() {
      var input = document.getElementById("inputPassword");
      input.type = input.type === "password" ? "text" : "password";
    }
  </script>
  <script>
  let loading = document.getElementById('loading'); 
  window.addEventListener('load', function(){
    if (loading) loading.style.display = "none";
  });
</script>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

<script src="js/setting.js"></script>
</body>
</html>
