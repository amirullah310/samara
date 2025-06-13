<?php
require '../database/koneksi.php';

// Ambil semua data artikel
$dataArtikel = query("SELECT * FROM artikel ORDER BY tanggal_publish DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Artikel</title>
  <link rel="stylesheet" href="css/artikel.css?<?php echo time(); ?>">

  
    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/aa9a0b170b.js" crossorigin="anonymous"></script>

    <!-- AOS CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet" /> -->

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
    <?php include 'css/artikel.css' ?>
  </style>
</head>
<body>
     <div class="falling-leaves"></div>

<?php include 'header_navbar.php'; ?>

  <div class="artikel-container">
    <h1 class="artikel-heading">Semua Data Artikel</h1>

    <?php if (!empty($dataArtikel)) : ?>
      <div class="tabel-scroll-wrapper">
      <table class="artikel-table">
        <thead>
          <tr>
            <th>No</th>
            <th>Judul</th>
            <!-- <th>Deskripsi</th> -->
            <th>Gambar</th>
            <th>Status</th>
            <th>Tanggal</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; foreach ($dataArtikel as $artikel): ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= htmlspecialchars($artikel['judul']); ?></td>
              <!-- <td><?= htmlspecialchars($artikel['deskripsi_singkat']); ?></td> -->
              <td>
                <?php if (!empty($artikel['gambar'])): ?>
                  <img src="<?= htmlspecialchars($artikel['gambar']); ?>" alt="Gambar Artikel" width="80">
                <?php else: ?>
                  Tidak ada
                <?php endif; ?>
              </td>
              <td>
                <span class="<?= $artikel['status'] === 'publish' ? 'status-publish' : 'status-draft'; ?>">
                  <?= ucfirst($artikel['status']); ?>
                </span>
              </td>
              <td><?= date('d M Y - H:i', strtotime($artikel['tanggal_publish'])); ?></td>
                <td class="artikel-actions">
                  <div class="action-buttons">
                    <a href="detail_artikel.php?id=<?= $artikel['id_artikel']; ?>" class="btn-detail">
                      <i class="fa-solid fa-circle-info"></i> Detail
                    </a>
                    <a href="edit_artikel.php?id=<?= $artikel['id_artikel']; ?>" class="btn-edit">
                      <i class="fa-solid fa-pen-to-square"></i> Edit
                    </a>
                    <a href="hapus_artikel.php?id=<?= $artikel['id_artikel']; ?>" class="btn-delete" onclick="return confirm('Yakin ingin menghapus artikel ini?')">
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
      <p>Tidak ada artikel yang tersedia.</p>
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
    loading.style.display = "none";
  });
</script>

<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script src="js/artikel.js"></script>

</body>
</html>
