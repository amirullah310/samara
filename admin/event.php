<?php
require '../database/koneksi.php';

// Ambil semua data event
$dataEvent = query("SELECT * FROM kegiatan ORDER BY tanggal_kegiatan DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Event</title>
  <link rel="stylesheet" href="css/event.css?<?php echo time(); ?>">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/aa9a0b170b.js" crossorigin="anonymous"></script>

  <style>
    <?php include 'css/event.css'; ?>
  </style>
</head>
<body>
     <div class="falling-leaves"></div>

<?php include 'header_navbar.php'; ?>

<div class="event-container fade-down">
  <h1 class="event-heading">Semua Data Event</h1>

  <?php if (!empty($dataEvent)) : ?>
    <div class="tabel-scroll-wrapper">
    <table class="event-table">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Kegiatan</th>
          <!-- <th>Deskripsi</th> -->
          <th>Tempat</th>
          <th>Tanggal</th>
          <th>Gambar</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1; foreach ($dataEvent as $event): ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= htmlspecialchars($event['nama_kegiatan']); ?></td>
          <!-- <td><?= htmlspecialchars($event['deskripsi']); ?></td> -->
          <td><?= htmlspecialchars($event['tempat']); ?></td>
          <td><?= date('d M Y', strtotime($event['tanggal_kegiatan'])); ?></td>
          <td>
            <?php if (!empty($event['gambar'])): ?>
              <img src="<?= htmlspecialchars($event['gambar']); ?>" alt="Gambar Event" width="80">
            <?php else: ?>
              Tidak ada
            <?php endif; ?>
          </td>
              <td class="event-actions">
                <div class="action-buttons">
                  <a href="detail_event.php?id=<?= $event['id_kegiatan']; ?>" class="btn-detail">
                    <i class="fa-solid fa-circle-info"></i> Detail
                  </a>
                  <a href="edit_event.php?id=<?= $event['id_kegiatan']; ?>" class="btn-edit">
                    <i class="fa-solid fa-pen-to-square"></i> Edit
                  </a>
                  <a href="hapus_event.php?id=<?= $event['id_kegiatan']; ?>" class="btn-delete" onclick="return confirm('Yakin ingin menghapus event ini?')">
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
    <p>Tidak ada event yang tersedia.</p>
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
        <li><a href="index.php">Home</a></li>
        <li><a href="artikel.php">Data Artikel</a></li>
        <li><a href="tipeartikel.php">Data Tipe Artikel</a></li>
        <li><a href="event.php">Data Event</a></li>
        <li><a href="setting.php">Setting</a></li>
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

<script>
  let loading = document.getElementById('loading'); 
  window.addEventListener('load', function(){
    if (loading) loading.style.display = "none";
  });
</script>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

<script src="js/event.js"></script>
</body>
</html>
