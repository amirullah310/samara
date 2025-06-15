<?php
require '../database/koneksi.php';

// Ambil nilai filter dari URL
$statusFilter = isset($_GET['status']) ? $_GET['status'] : '';
$tipeFilter = isset($_GET['tipe']) ? $_GET['tipe'] : '';
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

// Pagination setup
$limit = 5; // jumlah artikel per halaman
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int) $_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Inisialisasi array untuk kondisi WHERE
$where = [];

// Filter berdasarkan status
if ($statusFilter !== '') {
    $statusSafe = mysqli_real_escape_string($koneksi, $statusFilter);
    $where[] = "status = '$statusSafe'";
}

// Filter berdasarkan tipe artikel
if ($tipeFilter !== '') {
    $tipeSafe = mysqli_real_escape_string($koneksi, $tipeFilter);
    $where[] = "id_tipe = '$tipeSafe'";
}

// Filter berdasarkan keyword (judul)
if (!empty($keyword)) {
    $keywordSafe = mysqli_real_escape_string($koneksi, $keyword);
    $where[] = "judul LIKE '%$keywordSafe%'";
}

// Gabungkan semua kondisi ke dalam klausa WHERE
$whereClause = '';
if (!empty($where)) {
    $whereClause = 'WHERE ' . implode(' AND ', $where);
}

// Hitung total data (untuk pagination)
$countResult = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM artikel $whereClause");
$totalData = mysqli_fetch_assoc($countResult)['total'];
$totalPages = ceil($totalData / $limit);

// Ambil data artikel berdasarkan filter + pagination
$dataArtikel = query("SELECT * FROM artikel $whereClause ORDER BY tanggal_publish DESC LIMIT $limit OFFSET $offset");

// Ambil data tipe artikel untuk dropdown
$dataTipeArtikel = query("SELECT * FROM tipe_artikel");

// Generate ID artikel baru
function generateIdArtikel($koneksi) {
    $query = mysqli_query($koneksi, "SELECT MAX(id_artikel) as max_id FROM artikel");
    $data = mysqli_fetch_assoc($query);
    $maxId = $data['max_id'];

    if (!$maxId) {
        return 'A0001';
    }

    $numericPart = (int) substr($maxId, 1); // dari A0008 jadi 8
    $nextNumber = $numericPart + 1;
    $newId = 'A' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT); // A0009, A0010, dst

    return $newId;
}

$idBaru = generateIdArtikel($koneksi);

// Alert Edit
if (isset($_GET['edit'])): ?>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      <?php if ($_GET['edit'] === 'sukses'): ?>
        Swal.fire({
          icon: 'success',
          title: 'Berhasil!',
          text: 'Artikel berhasil diperbarui.',
          confirmButtonColor: '#3085d6'
        });
      <?php else: ?>
        Swal.fire({
          icon: 'error',
          title: 'Gagal!',
          text: 'Gagal memperbarui artikel.',
          confirmButtonColor: '#d33'
        });
      <?php endif; ?>
    });
  </script>
  <?php endif;
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

  <div class="artikel-container fade-down">
    <h1 class="artikel-heading">Semua Data Artikel</h1>
<!-- Container atas untuk filter & tombol tambah -->
<!-- Wrapper Filter & Tambah -->
<div class="filter-container">
  <!-- Form Filter -->
  <form method="GET" action="" id="filterForm" class="filter-form">
    <!-- Status -->
    <label for="filterStatus">Status:</label>
    <select name="status" id="filterStatus" onchange="document.getElementById('filterForm').submit()">
      <option value="">-- Semua --</option>
      <option value="publish" <?= isset($_GET['status']) && $_GET['status'] === 'publish' ? 'selected' : '' ?>>Publish</option>
      <option value="draft" <?= isset($_GET['status']) && $_GET['status'] === 'draft' ? 'selected' : '' ?>>Draft</option>
    </select>

    <!-- Tipe -->
    <label for="filterTipe">Tipe:</label>
    <select name="tipe" id="filterTipe" onchange="document.getElementById('filterForm').submit()">
      <option value="">-- Semua --</option>
      <?php foreach ($dataTipeArtikel as $tipe): ?>
        <option value="<?= $tipe['id_tipe'] ?>" <?= (isset($_GET['tipe']) && $_GET['tipe'] === $tipe['id_tipe']) ? 'selected' : '' ?>>
          <?= htmlspecialchars($tipe['nama_tipe']) ?>
        </option>
      <?php endforeach; ?>
    </select>

    <!-- Judul -->
    <label for="keyword">Judul:</label>
    <input type="text" name="keyword" id="keyword" placeholder="Cari judul..." value="<?= isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : '' ?>">

    <!-- Tombol Cari -->
    <button type="submit" class="btn-cari">
      <i class="fa fa-search"></i> Cari
    </button>

    <!-- Tombol Reset -->
    <a href="?" class="btn-reset">
      <i class="fa fa-rotate-left"></i> Reset
    </a>
  </form>

  <!-- Tombol Tambah Artikel -->
  <button type="button" onclick="document.getElementById('modalTambah').style.display='block'" class="btn-tambah">
    <i class="fa fa-plus"></i> Tambah Artikel
  </button>
</div>







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
                    <button type="button" style="border:1px solid green;" 
                      class="btn-edit" 
                      onclick='openEditModal(
                        <?= json_encode($artikel) ?>)'>
                      <i class="fa-solid fa-pen-to-square"></i> Edit
                    </button>
<a href="#" class="btn-delete" onclick="confirmDelete('<?= $artikel['id_artikel']; ?>')">
  <i class="fa-solid fa-trash"></i> Hapus
</a>

                  </div>
                </td>


            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <?php if ($totalPages > 1): ?>
  <div class="pagination">
    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
      <a href="?<?= http_build_query(array_merge($_GET, ['page' => $i])) ?>" class="<?= ($i == $page) ? 'active' : '' ?>">
        <?= $i ?>
      </a>
    <?php endfor; ?>
  </div>
<?php endif; ?>

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

<div id="modalTambah" class="modal">
  <div class="modal-content">
    <span onclick="document.getElementById('modalTambah').style.display='none'" class="close">&times;</span>
    <h2>Tambah Artikel Baru</h2>
<form action="tambah_artikel.php" method="post" enctype="multipart/form-data">
<label>ID Artikel</label>
<input type="text" name="id_artikel" value="<?= $idBaru ?>" readonly style="background-color: #eee;">

  <input type="hidden" name="id_artikel" value="<?= $idBaru ?>">

  <label>Judul Artikel</label>
  <input type="text" name="judul" required>

  <label>Deskripsi Singkat</label>
  <textarea name="deskripsi_singkat" required></textarea>

  <label>Isi Artikel</label>
  <textarea name="isi" required></textarea>

  <label>Upload Gambar</label>
  <input type="file" name="gambar" accept="image/*" required>

  <label>Status</label>
  <select name="status" required>
    <option value="draft">Draft</option>
    <option value="publish">Publish</option>
  </select>

  <label for="id_tipe">Tipe Artikel</label>
  <select name="id_tipe" required>
    <option value="">-- Pilih Tipe Artikel --</option>
    <?php foreach ($dataTipeArtikel as $tipe): ?>
      <option value="<?= htmlspecialchars($tipe['id_tipe']) ?>">
        <?= htmlspecialchars($tipe['id_tipe']) ?> - <?= htmlspecialchars($tipe['nama_tipe']) ?>
      </option>
    <?php endforeach; ?>
  </select>

  <button type="submit" class="btn-submit">Simpan</button>
</form>

  </div>
</div>

<!-- modal edit -->
<div id="modalEdit" class="modal">
  <div class="modal-content">
    <span onclick="document.getElementById('modalEdit').style.display='none'" class="close">&times;</span>
    <h2>Edit Artikel</h2>
    <form id="editForm" action="edit_artikel.php" method="post" enctype="multipart/form-data">
      <input type="hidden" name="id_artikel" id="edit_id_artikel">

      <label>Judul Artikel</label>
      <input type="text" name="judul" id="edit_judul" required>

      <label>Deskripsi Singkat</label>
      <textarea name="deskripsi_singkat" id="edit_deskripsi_singkat" rows="2" required></textarea>

      <label>Isi Artikel</label>
      <textarea name="isi" id="edit_isi" rows="9" required></textarea>

      <label>Upload Gambar Baru (opsional)</label>
      <input type="file" name="gambar" accept="image/*">

      <label>Status</label>
      <select name="status" id="edit_status" required>
        <option value="draft">Draft</option>
        <option value="publish">Publish</option>
      </select>

      <label for="id_tipe">Tipe Artikel</label>
      <select name="id_tipe" id="edit_id_tipe" required>
        <option value="">-- Pilih Tipe Artikel --</option>
        <?php foreach ($dataTipeArtikel as $tipe): ?>
          <option value="<?= htmlspecialchars($tipe['id_tipe']) ?>">
            <?= htmlspecialchars($tipe['id_tipe']) ?> - <?= htmlspecialchars($tipe['nama_tipe']) ?>
          </option>
        <?php endforeach; ?>
      </select>

      <button type="submit" class="btn-submit">Simpan Perubahan</button>
    </form>
  </div>
</div>




  <script>
  let loading = document.getElementById('loading'); 
  window.addEventListener('load', function(){
    loading.style.display = "none";
  });
</script>
<script>
  const modal = document.getElementById("artikelModal");
  const btn = document.getElementById("openModalBtn");
  const span = document.getElementsByClassName("close")[0];

  btn.onclick = function() {
    modal.style.display = "block";
  }

  span.onclick = function() {
    modal.style.display = "none";
  }

  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
</script>


<!-- script edit -->
<script>
function openEditModal(data) {
  document.getElementById('modalEdit').style.display = 'block';

  document.getElementById('edit_id_artikel').value = data.id_artikel;
  document.getElementById('edit_judul').value = data.judul;
  document.getElementById('edit_deskripsi_singkat').value = data.deskripsi_singkat;
  document.getElementById('edit_isi').value = data.isi;
  document.getElementById('edit_status').value = data.status;
  document.getElementById('edit_id_tipe').value = data.id_tipe;
}
</script>


<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="js/artikel.js"></script>
<script>
function confirmDelete(id) {
  Swal.fire({
    title: 'Yakin ingin menghapus?',
    text: "Data artikel akan dihapus secara permanen.",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#6c757d',
    confirmButtonText: 'Ya, hapus!',
    cancelButtonText: 'Batal'
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = 'hapus_artikel.php?id=' + encodeURIComponent(id);
    }
  });
}
</script>
<script>
  
</script>

<?php if (isset($_GET['hapus'])): ?>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      <?php if ($_GET['hapus'] === 'sukses'): ?>
        Swal.fire({
          icon: 'success',
          title: 'Berhasil!',
          text: 'Artikel berhasil dihapus.',
          confirmButtonColor: '#3085d6'
        });
      <?php elseif ($_GET['hapus'] === 'gagal'): ?>
        Swal.fire({
          icon: 'error',
          title: 'Gagal!',
          text: 'Terjadi kesalahan saat menghapus artikel.',
          confirmButtonColor: '#d33'
        });
      <?php elseif ($_GET['hapus'] === 'tidakditemukan'): ?>
        Swal.fire({
          icon: 'warning',
          title: 'Oops!',
          text: 'Artikel tidak ditemukan.',
          confirmButtonColor: '#f0ad4e'
        });
      <?php elseif ($_GET['hapus'] === 'tidakadaid'): ?>
        Swal.fire({
          icon: 'info',
          title: 'Informasi',
          text: 'ID artikel tidak valid.',
          confirmButtonColor: '#17a2b8'
        });
      <?php endif; ?>
    });
  </script>
<?php endif; ?>


</body>
</html>
