<?php
require '../database/koneksi.php'; // ganti jika file koneksi beda

// session_start();
// if (!isset($_SESSION['username'])) {
//   header("location:login.php");
//   exit;
// }

error_reporting(0);

// Ambil data artikel terbaru
$data = query("SELECT * FROM artikel ORDER BY tanggal_publish DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>List Artikel</title>
  <link rel="stylesheet" href="css/listpost.css?<?php echo time(); ?>" />
  <style>
    <?php include 'css/listpost.css'; ?>
  </style>
</head>
<body>
<?php include 'header_navbar.php'; ?>

<div class="tbl">
  <div class="pra">
    <h1>List Artikel</h1>
    <a href="addpost.php"><button>Tambah Artikel</button></a>
  </div>

  <table>
    <thead class="siuu">
      <tr>
        <th>No</th>
        <th>Judul Artikel</th>
        <th>Tipe</th>
        <th>Tanggal</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1; ?>
      <?php foreach ($data as $row): ?>
        <tr>
          <td><?= $i ?></td>
          <td><?= htmlspecialchars($row['judul']) ?></td>
          <td><?= htmlspecialchars($row['tipe_artikel']) ?></td>
          <td><?= date("d-m-Y", strtotime($row['tanggal_publish'])) ?></td>
          <td class="yakin">
            <a href="blog-detail.php?id=<?= urlencode($row['id_artikel']) ?>" class="hd">Detail</a>
          </td>
        </tr>
        <?php $i++; ?>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<script>
  let loading = document.getElementById('loading');
  window.addEventListener('load', function () {
    loading.style.display = "none";
  });
</script>
</body>
</html>
