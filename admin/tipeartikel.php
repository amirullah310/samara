<?php
require '../database/koneksi.php';

// Ambil semua data tipe artikel
$dataTipeArtikel = query("SELECT * FROM tipe_artikel ORDER BY id_tipe DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Tipe Artikel</title>
  <link rel="stylesheet" href="css/tipeartikel.css?<?php echo time(); ?>">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/aa9a0b170b.js" crossorigin="anonymous"></script>

  <style>
    <?php include 'css/tipeartikel.css'; ?>
  </style>
</head>
<body>
     <div class="falling-leaves"></div>


<?php include 'header_navbar.php'; ?>

<div class="tipeartikel-container">
  <h1 class="tipeartikel-heading">Semua Tipe Artikel</h1>

  <?php if (!empty($dataTipeArtikel)) : ?>
    <div class="tabel-scroll-wrapper">
    <table class="tipeartikel-table">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Tipe</th>
          <th>Deskripsi</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1; foreach ($dataTipeArtikel as $tipe): ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= htmlspecialchars($tipe['nama_tipe']); ?></td>
          <td><?= htmlspecialchars($tipe['deskripsi']); ?></td>
          <td class="tipeartikel-actions">
            <div class="action-buttons">
              <a href="edit_tipeartikel.php?id=<?= $tipe['id_tipe']; ?>" class="btn-edit">
                <i class="fa-solid fa-pen-to-square"></i> Edit
              </a>
              <a href="hapus_tipeartikel.php?id=<?= $tipe['id_tipe']; ?>" class="btn-delete" onclick="return confirm('Yakin ingin menghapus tipe ini?')">
                <i class="fa-solid fa-trash"></i> Hapus
              </a>
            </div>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    </div>
  <?php else : ?>
    <p>Tidak ada tipe artikel yang tersedia.</p>
  <?php endif; ?>
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
  let loading = document.getElementById('loading'); 
  window.addEventListener('load', function(){
    if (loading) loading.style.display = "none";
  });
</script>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

<script src="js/tipeartikel.js"></script>
</body>
</html>
