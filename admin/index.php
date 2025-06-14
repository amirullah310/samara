<?php
require '../database/koneksi.php';


session_start();
if (!isset($_SESSION['id_admin'])) {
  header("location:login.php");
  exit;
}

error_reporting(0);

// // Fungsi query umum (jika belum ada)
// function query($query) {
//   global $koneksi;
//   $result = mysqli_query($koneksi, $query);
//   $rows = [];
//   while ($row = mysqli_fetch_assoc($result)) {
//     $rows[] = $row;
//   }
//   return $rows;
// }

// Ambil data artikel terbaru (limit 5)
$dataArtikel = query("SELECT * FROM artikel ORDER BY id_artikel DESC LIMIT 5");

// Ambil data event terbaru (limit 5)
$dataEvent = query("SELECT * FROM kegiatan ORDER BY id_kegiatan DESC LIMIT 5");

// Ambil semua admin berdasarkan last login DESC
$dataSemuaAdmin = query("SELECT * FROM admin ORDER BY last_login DESC");

// Hitung total blog
$getBlog = mysqli_query($koneksi, "SELECT * FROM artikel");
$countBlog = mysqli_num_rows($getBlog);

// Hitung total event
$getEvent = mysqli_query($koneksi, "SELECT * FROM kegiatan");
$countEvent = mysqli_num_rows($getEvent);

// Hitung total user (dalam konteks ini: semua admin dianggap user)
$getUser = mysqli_query($koneksi, "SELECT * FROM admin");
$countUser = mysqli_num_rows($getUser);

// Hitung total admin
$getAdmin = mysqli_query($koneksi, "SELECT * FROM admin");
$countAdmin = mysqli_num_rows($getAdmin);

$now = date('Y-m-d H:i:s');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
  <link rel="stylesheet" href="css/index.css?<?php echo time(); ?>">

  
    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/aa9a0b170b.js" crossorigin="anonymous"></script>

    <!-- AOS CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet" /> -->

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

  <style>
    <?php include 'css/index.php' ?>
  </style>
</head>
<body>
     <div class="falling-leaves"></div>

<?php include 'header_navbar.php'; ?>

<div class="dashboard-wrapper fade-down">
  <h1 class="dashboard-title">Dashboard Overview</h1>

  <div class="dashboard-cards">
    <div class="card">
      <i class="fa-solid fa-blog"></i>
      <div>
        <h2><?php echo $countBlog; ?></h2>
        <p>Total Blog</p>
      </div>
    </div>
    <div class="card">
      <i class="fa-solid fa-calendar-days"></i>
      <div>
        <h2><?php echo $countEvent; ?></h2>
        <p>Total Event</p>
      </div>
    </div>
    <div class="card">
      <i class="fa-solid fa-users"></i>
      <div>
        <h2><?php echo $countUser; ?></h2>
        <p>Total User</p>
      </div>
    </div>
    <div class="card">
      <i class="fa-solid fa-user-shield"></i>
      <div>
        <h2><?php echo $countAdmin; ?></h2>
        <p>Total Admin</p>
      </div>
    </div>
  </div>

  <div class="dashboard-latest">
    <div class="latest-box">
      <h3>Artikel Terbaru</h3>
      <ul>
        <?php foreach ($dataArtikel as $artikel): ?>
          <li><i class="fa-solid fa-circle-dot"></i> <?php echo $artikel['judul']; ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
<div class="latest-box">
  <h3>Event Terbaru</h3>
  <ul>
    <?php
      // Ambil data event terbaru
      $dataEvent = query("SELECT * FROM kegiatan ORDER BY id_kegiatan DESC LIMIT 5");
      foreach ($dataEvent as $event):
    ?>
      <li><i class="fa-solid fa-calendar-days"></i> <?php echo $event['nama_kegiatan']; ?></li>
    <?php endforeach; ?>
  </ul>
</div>
<div class="latest-box">
  <h3>Aktivitas Admin</h3>
  <ul>
    <?php foreach ($dataSemuaAdmin as $admin): ?>
      <li style="margin-bottom: 10px;">
        <i class="fa-solid fa-user-shield" style="margin-right: 5px;"></i>
        <strong><?= htmlspecialchars($admin['nama_admin']) ?></strong>

        <?php if ($admin['id_admin'] == $_SESSION['id_admin']): ?>
          <span style="color: green; font-weight: bold;"> • Online</span>
        <?php else: ?>
          <?php
            if (!empty($admin['last_login']) && $admin['last_login'] !== '0000-00-00 00:00:00') {
              $formattedLogin = date("d M Y H:i:s", strtotime($admin['last_login']));
              echo "<span style='color: gray; font-style: italic;'> • Last login: $formattedLogin</span>";
            } else {
              echo "<span style='color: gray; font-style: italic;'> • Belum pernah login</span>";
            }
          ?>
        <?php endif; ?>
      </li>
    <?php endforeach; ?>
  </ul>
</div>



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
    loading.style.display = "none";
  });
</script>

<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script src="js/script.js"></script>
</body>


      </html>
      