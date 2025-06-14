<?php
session_start();
require '../database/koneksi.php';

// Cek login
if (!isset($_SESSION['id_admin'])) {
    header("Location: login.php");
    exit;
}

$id_admin = $_SESSION['id_admin'];

// Ambil data admin
$result = mysqli_query($koneksi, "SELECT * FROM admin WHERE id_admin = '$id_admin'");
$data = mysqli_fetch_assoc($result);

// Jika form disubmit
if (isset($_POST['submit'])) {
    $username = $_POST['nama_admin'];
    $email = $_POST['email'];
    $old = $_POST['old_password'];
    $new = $_POST['new_password'];

    // Cek password lama
    if ($data['password'] === $old) {
        // Update semua data
        $update = mysqli_query($koneksi, "UPDATE admin SET nama_admin = '$username', email = '$email', password = '$new' WHERE id_admin = '$id_admin'");
        if ($update) {
            echo "<script>alert('Data berhasil diubah'); window.location.href='setting.php';</script>";
        } else {
            echo "<script>alert('Gagal mengubah data'); window.location.href='setting.php';</script>";
        }
    } else {
        echo "<script>alert('Password lama salah!'); window.location.href='setting.php';</script>";
    }
}
?>



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

  <div class="setting-container fade-down">
    <h1 class="setting-heading">Pengaturan Akun</h1>

    <div class="setting-content">
  <!-- Logout Form Diletakkan Terpisah di Atas atau Sebelah Header -->
<form action="logout.php" method="post" style="position: absolute; top: 20px; right: 20px;">
  <button type="submit" class="btn-logout" style="margin-top: 70px; background-color: #d9534f; color: white; padding: 10px 15px; border: none; border-radius: 5px; cursor: pointer;">
    <i class="fa-solid fa-right-from-bracket"></i> Logout
  </button>
</form>

      <form action="setting.php" method="post" class="form-akun">
  <div class="form-section">
    <div class="form-header" style="display: flex; justify-content: space-between; align-items: center;">
      <div style="display: flex; align-items: center; gap: 10px;">
        <img src="https://cdn.iconscout.com/icon/free/png-128/person-1780867-1514182.png" alt="Profile" />
        <h2>Informasi Akun</h2>
      </div>
      </form>
    </div>

    <div class="form-group">
      <label for="username">Username</label>
      <input type="text" id="username" name="nama_admin" placeholder="Masukkan Username"
             value="<?php echo htmlspecialchars($data['nama_admin']); ?>" required />
    </div>

    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" id="email" name="email" placeholder="Masukkan Email"
             value="<?php echo htmlspecialchars($data['email']); ?>" required />
    </div>

    <div class="form-group">
      <label for="old_password">Password Lama</label>
      <input type="password" id="old_password" name="old_password" placeholder="Masukkan Password Lama"
      value="<?php echo htmlspecialchars($data['password']); ?>"
      required />
    </div>

    <div class="form-group">
      <label for="new_password">Password Baru</label>
      <input type="password" id="new_password" name="new_password" placeholder="Masukkan Password Baru" required />
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
  function togglePassword() {
  const oldPass = document.getElementById("old_password");
  const newPass = document.getElementById("new_password");
  const type = oldPass.type === "password" ? "text" : "password";
  oldPass.type = type;
  newPass.type = type;
}
</script>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

<script src="js/setting.js"></script>
</body>
</html>
