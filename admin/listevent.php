<?php
require '../database/koneksi.php';

$data = query("SELECT * FROM kegiatan ORDER BY tanggal_kegiatan DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>List Kegiatan</title>
  <link rel="stylesheet" href="css/listpost.css?<?php echo time(); ?>" />
  <style>
    <?php include 'css/listpost.css'; ?>
  </style>
</head>
<body>
<?php include 'header_navbar.php'; ?>

<div class="tbl">
  <div class="pra">
    <h1>List Kegiatan</h1>
    <a href="addkegiatan.php"><button>Tambah Kegiatan</button></a>
  </div>

  <table>
    <thead class="siuu">
      <tr>
        <th>No</th>
        <th>Nama Kegiatan</th>
        <th>Tanggal</th>
        <th>Tempat</th>
        <th>Ketua Pelaksana</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1; ?>
      <?php foreach ($data as $row): ?>
        <tr>
          <td><?= $i ?></td>
          <td><?= htmlspecialchars($row['nama_kegiatan']) ?></td>
          <td><?= date("d-m-Y", strtotime($row['tanggal_kegiatan'])) ?></td>
          <td><?= htmlspecialchars($row['tempat']) ?></td>
          <td><?= htmlspecialchars($row['ketua_pelaksana']) ?></td>
          <td class="yakin">
            <a href="detail-kegiatan.php?id=<?= urlencode($row['id_kegiatan']) ?>" class="hd">Detail</a>
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
