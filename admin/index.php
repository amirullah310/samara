<?php
require '../database/koneksi.php';

// session_start();
// if (!isset($_SESSION['id_admin'])) {
//   header("location:login.php");
//   exit;
// }
// error_reporting(0);


// Ambil data user dan blog terbaru
$dataUser = query("SELECT * FROM admin ORDER BY id_admin DESC LIMIT 3");
$dataArtikel = query("SELECT * FROM artikel ORDER BY id_artikel DESC LIMIT 5");

// Hitung total artikel (blog)
$getBlog = mysqli_query($koneksi, "SELECT * FROM artikel");
$countBlog = mysqli_num_rows($getBlog);

// Hitung total user (semua role)
$getUser = mysqli_query($koneksi, "SELECT * FROM admin");
$countUser = mysqli_num_rows($getUser);

// Hitung total event
$getEvent = mysqli_query($koneksi, "SELECT * FROM kegiatan");
$countEvent = mysqli_num_rows($getEvent);

// Hitung total admin
$getAdmin = mysqli_query($koneksi, "SELECT * FROM admin");
$countAdmin = mysqli_num_rows($getAdmin);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
  <link rel="stylesheet" href="css/index.css?<?php echo time(); ?>">
  <style>
    <?php include 'css/index.php' ?>
  </style>
</head>
<body>  
  <?php include 'header_navbar.php'; ?>
      <div class="isi">
        <h1>Halaman Dashboard</h1>

        <div class="card-content">
  <div class="content">
    <div class="card">
      <img src="./img/artikel.jpg" alt="">
      <h2><?= $countBlog; ?><hr size="1px" width="200px"></h2>
      <h3>Artikel</h3>
    </div>
  </div>
  <div class="content">
    <div class="card">
      <img src="./img/event.png" alt="">
      <h2><?= $countEvent; ?><hr size="1px" width="200px"></h2>
      <h3>Event</h3>
    </div>
  </div>
  <div class="content">
    <div class="card">
      <img src="./img/user.png" alt="">
      <h2><?= $countAdmin; ?><hr size="1px" width="200px"></h2>
      <h3>Admin</h3>
    </div>
  </div>
</div>
              </tbody>
    </table>
          </div>
        </div>
          </div>
      </div>
        <script>
          let loading = document.getElementById('loading'); 

          window.addEventListener('load', function(){
            loading.style.display= "none";
          })
        </script>
      </body>
      </html>
      