<?php
require '../database/koneksi.php';

$statusFilter = $_GET['status'] ?? '';
$tipeFilter = $_GET['tipe'] ?? '';
$keyword = $_GET['keyword'] ?? '';

// Pagination
$limit = 5;
$page = (isset($_GET['page']) && is_numeric($_GET['page']) && $_GET['page'] > 0) ? (int) $_GET['page'] : 1;
$offset = ($page - 1) * $limit;

$dataTipeArtikel = query("SELECT * FROM tipe_artikel");

if (isset($_GET['edit'])): ?>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      Swal.fire({
        icon: '<?= $_GET['edit'] === 'sukses' ? 'success' : 'error' ?>',
        title: '<?= $_GET['edit'] === 'sukses' ? 'Berhasil!' : 'Gagal!' ?>',
        text: '<?= $_GET['edit'] === 'sukses' ? 'Tipe artikel berhasil diperbarui.' : 'Gagal memperbarui tipe artikel.' ?>',
        confirmButtonColor: '<?= $_GET['edit'] === 'sukses' ? '#3085d6' : '#d33' ?>'
      });
    });
  </script>
<?php endif; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Tipe Artikel | SAMARA Admin</title>
  <link rel="stylesheet" href="css/tipeartikel.css?<?= time(); ?>">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/aa9a0b170b.js" crossorigin="anonymous"></script>
</head>
<body>

<?php include 'header_navbar.php'; ?>

<div class="tipeartikel-container fade-down">
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
                <button type="button" style="border:1px solid green;"
                  class="btn-edit"
                  onclick="openEditModal(
                    '<?= $tipe['id_tipe'] ?>',
                    '<?= htmlspecialchars($tipe['nama_tipe'], ENT_QUOTES) ?>',
                    '<?= htmlspecialchars($tipe['deskripsi'], ENT_QUOTES) ?>'
                  )">
                  <i class="fa-solid fa-pen-to-square"></i> Edit
                </button>

                <button type="button" style="border:1px solid red;"
                  class="btn-delete" 
                  onclick="confirmDelete('<?= $tipe['id_tipe']; ?>')">
                  <i class="fa-solid fa-trash"></i> Hapus
                </button>

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

<!-- Footer -->
<footer>
  <div class="footer-container">
    <div class="footer-section">
      <img src="img/icon-logo.png" alt="Logo SAMARA" class="footer-logo">
      <p>SAMARA adalah organisasi yang berdedikasi untuk mendukung pelestarian alam dan mendorong kesadaran lingkungan hidup.</p>
      <div class="social-links">
        <a href="#"><i class="fa-brands fa-facebook"></i></a>
        <a href="#"><i class="fa-brands fa-instagram"></i></a>
        <a href="#"><i class="fa-brands fa-youtube"></i></a>
      </div>
    </div>
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
    <div class="footer-section">
      <h4>KONTAK</h4>
      <ul>
        <li><i class="fa-solid fa-location-dot"></i> Lhokseumawe, Aceh, Indonesia</li>
        <li><i class="fa-solid fa-phone"></i> +62 812 3456 7890</li>
        <li><i class="fa-solid fa-envelope"></i> contactsamaraofficial@gmail.com</li>
      </ul>
    </div>
  </div>
  <div class="footer-bottom">
    <p>&copy; 2025 SAMARA. All rights reserved.</p>
  </div>
</footer>

<!-- Modal Edit -->
<div id="modalEditTipe" class="modal">
  <div class="modal-content">
    <span onclick="closeModal('modalEditTipe')" class="close">&times;</span>
    <h2>Edit Tipe Artikel</h2>
    <form id="editTipeForm" action="edit_tipeartikel.php" method="post">
      <input type="hidden" name="id_tipe" id="edit_id_tipe">
      <label for="edit_nama_tipe">Nama Tipe Artikel</label>
      <input type="text" name="nama_tipe" id="edit_nama_tipe" required>
      <label for="edit_deskripsi">Deskripsi</label>
      <textarea name="deskripsi" id="edit_deskripsi" required></textarea>
      <button type="submit" class="btn-submit">Simpan Perubahan</button>
    </form>
  </div>
</div>

<!-- Script Konfirmasi Hapus -->
<script>
function confirmDelete(id) {
  Swal.fire({
    title: 'Yakin ingin menghapus?',
    text: "Tipe artikel akan dihapus secara permanen.",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#6c757d',
    confirmButtonText: 'Ya, hapus!',
    cancelButtonText: 'Batal'
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = 'hapus_tipeartikel.php?id=' + encodeURIComponent(id);
    }
  });
}
</script>

<?php if (isset($_GET['hapus'])): ?>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      <?php if ($_GET['hapus'] === 'sukses'): ?>
        Swal.fire({
          icon: 'success',
          title: 'Berhasil!',
          text: 'Tipe artikel berhasil dihapus.',
          confirmButtonColor: '#3085d6'
        });
      <?php elseif ($_GET['hapus'] === 'gagal'): ?>
        Swal.fire({
          icon: 'error',
          title: 'Gagal!',
          text: 'Terjadi kesalahan saat menghapus tipe artikel.',
          confirmButtonColor: '#d33'
        });
      <?php elseif ($_GET['hapus'] === 'tidakditemukan'): ?>
        Swal.fire({
          icon: 'warning',
          title: 'Oops!',
          text: 'Tipe artikel tidak ditemukan.',
          confirmButtonColor: '#f0ad4e'
        });
      <?php elseif ($_GET['hapus'] === 'tidakadaid'): ?>
        Swal.fire({
          icon: 'info',
          title: 'Informasi',
          text: 'ID tipe artikel tidak valid.',
          confirmButtonColor: '#17a2b8'
        });
      <?php elseif ($_GET['hapus'] === 'dipakai'): ?>
        Swal.fire({
          icon: 'warning',
          title: 'Tidak Bisa Dihapus!',
          text: 'Tipe artikel ini masih digunakan dalam data artikel. Silakan hapus atau ubah artikel terkait terlebih dahulu.',
          confirmButtonColor: '#ff9f43'
        });
      <?php endif; ?>
    });
  </script>
<?php endif; ?>


<!-- Script Modal Edit -->
<script>
function openEditModal(id, nama, deskripsi) {
  document.getElementById('edit_id_tipe').value = id;
  document.getElementById('edit_nama_tipe').value = nama;
  document.getElementById('edit_deskripsi').value = deskripsi;
  document.getElementById('modalEditTipe').style.display = 'block';
}

function closeModal(modalId) {
  document.getElementById(modalId).style.display = 'none';
}

window.onclick = function(event) {
  const modals = ['modalEditTipe'];
  modals.forEach(function(modalId) {
    let modal = document.getElementById(modalId);
    if (event.target === modal) {
      modal.style.display = "none";
    }
  });
}
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html>
