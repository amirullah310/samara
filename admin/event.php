<?php
require '../database/koneksi.php';

// Ambil semua data event
$dataEvent = query("SELECT * FROM kegiatan ORDER BY tanggal_kegiatan DESC");

// Generate ID baru untuk modal tambah
$query = mysqli_query($koneksi, "SELECT MAX(id_kegiatan) AS id_terakhir FROM kegiatan");
$data = mysqli_fetch_assoc($query);
$idBaru = ($data['id_terakhir'] == null) ? 'KG001' : 'KG' . str_pad((int) substr($data['id_terakhir'], 3) + 1, 3, '0', STR_PAD_LEFT);

// Untuk menangani pesan notifikasi
$pesan = isset($_GET['pesan']) ? $_GET['pesan'] : '';
$alertType = '';
$alertMessage = '';

switch($pesan) {
    case 'tambah_berhasil':
        $alertType = 'success';
        $alertMessage = 'Event berhasil ditambahkan!';
        break;
    case 'update_berhasil':
        $alertType = 'success';
        $alertMessage = 'Event berhasil diperbarui!';
        break;
    case 'hapus_berhasil':
        $alertType = 'success';
        $alertMessage = 'Event berhasil dihapus!';
        break;
    case 'error':
        $alertType = 'danger';
        $alertMessage = 'Terjadi kesalahan!';
        break;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Event</title>
    <link rel="stylesheet" href="css/event.css?<?php echo time(); ?>">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- AOS CSS -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet" />
    <style>
        /* Style untuk notifikasi */
        .alert-notification {
            position: fixed;
            top: 80px;
            right: 20px;
            z-index: 1100;
            min-width: 300px;
            animation: slideIn 0.3s ease-out;
        }

        .alert {
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            border: none;
            border-radius: 8px;
            padding: 15px 20px;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border-left: 4px solid #28a745;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border-left: 4px solid #dc3545;
        }

        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1100;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 600px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover {
            color: black;
        }

        body.modal-open {
            overflow: hidden;
        }
    </style>
</head>
<body>
    <!-- Notifikasi Alert -->
    <?php if (!empty($pesan)): ?>
    <div class="alert-notification">
        <div class="alert alert-<?= $alertType ?> alert-dismissible fade show" role="alert">
            <?= $alertMessage ?>
            <button type="button" class="btn-close" onclick="this.parentElement.style.display='none'"></button>
        </div>
    </div>
    <?php endif; ?>

    <div class="falling-leaves"></div>
    <?php include 'header_navbar.php'; ?>

    <div class="event-container fade-down">
        <h1 class="event-heading">Semua Data Event</h1>
        <div class="filter-container">
            <button type="button" class="btn-tambah" onclick="openTambahModal()">
                <i class="fa fa-plus"></i> Tambah Event
            </button>
        </div>

        <?php if (!empty($dataEvent)) : ?>
            <div class="tabel-scroll-wrapper">
                <table class="event-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kegiatan</th>
                            <th>Tempat</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($dataEvent as $event): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= htmlspecialchars($event['nama_kegiatan']); ?></td>
                            <td><?= htmlspecialchars($event['tempat']); ?></td>
                            <td><?= date('d M Y', strtotime($event['tanggal_kegiatan'])); ?></td>
                            <td class="event-actions">
                                <div class="action-buttons">
                                    <a href="detail_event.php?id=<?= $event['id_kegiatan']; ?>" class="btn-detail">
                                        <i class="fa-solid fa-circle-info"></i> Detail
                                    </a>
                                    <button class="btn-edit" data-event-id="<?= $event['id_kegiatan'] ?>">
                                        <i class="fa-solid fa-pen-to-square"></i> Edit
                                    </button>
                                    <button class="btn-delete" onclick="confirmDelete('<?= $event['id_kegiatan']; ?>')">
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
            <p>Tidak ada event yang tersedia.</p>
        <?php endif; ?>
    </div>

    <!-- Modal Edit Event -->
    <div id="modalEditEvent" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeEditModal()">&times;</span>
            <h2>Edit Event</h2>
            <form id="editEventForm" action="edit_event.php" method="post">
                <input type="hidden" name="id_kegiatan" id="edit-id-kegiatan">
                
                <div class="form-group">
                    <label for="edit-nama-kegiatan">Nama Kegiatan</label>
                    <input type="text" id="edit-nama-kegiatan" name="nama_kegiatan" required>
                </div>
                
                <div class="form-group">
                    <label for="edit-tempat">Tempat</label>
                    <input type="text" id="edit-tempat" name="tempat" required>
                </div>
                
                <div class="form-group">
                    <label for="edit-tanggal">Tanggal Kegiatan</label>
                    <input type="date" id="edit-tanggal" name="tanggal_kegiatan" required>
                </div>
                
                <div class="form-group">
                    <label for="edit-deskripsi">Deskripsi Kegiatan</label>
                    <textarea id="edit-deskripsi" name="deskripsi_kegiatan" required></textarea>
                </div>
                
                <div class="form-actions">
                    <button type="button" class="btn-cancel" onclick="closeEditModal()">Batal</button>
                    <button type="submit" class="btn-submit">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Tambah Event -->
    <div id="modalTambahEvent" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeTambahModal()">&times;</span>
            <h2>Tambah Event Baru</h2>
            <form action="tambah_event.php" method="post">
                <div class="form-group">
                    <label>ID Event</label>
                    <input type="text" name="id_kegiatan" value="<?= $idBaru ?>" readonly style="background-color: #eee;">
                </div>

                <div class="form-group">
                    <label>Nama Kegiatan</label>
                    <input type="text" name="nama_kegiatan" required>
                </div>

                <div class="form-group">
                    <label>Tempat</label>
                    <input type="text" name="tempat" required>
                </div>

                <div class="form-group">
                    <label>Tanggal Kegiatan</label>
                    <input type="date" name="tanggal_kegiatan" required>
                </div>

                <div class="form-group">
                    <label>Deskripsi Kegiatan</label>
                    <textarea name="deskripsi_kegiatan" rows="4" required></textarea>
                </div>

                <button type="submit" class="btn-submit">Simpan</button>
            </form>
        </div>
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

    <button id="backToTop" title="Kembali ke atas" aria-label="Back to top">
        <i class="fa-solid fa-arrow-up"></i>
    </button>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Fungsi untuk membuka modal edit dengan data
        async function openEditModal(eventId) {
            try {
                // Ambil data event via AJAX
                const response = await fetch(`get_event_data.php?id=${eventId}`);
                if (!response.ok) throw new Error('Gagal memuat data');
                
                const eventData = await response.json();
                
                // Isi form dengan data
                document.getElementById('edit-id-kegiatan').value = eventData.id_kegiatan;
                document.getElementById('edit-nama-kegiatan').value = eventData.nama_kegiatan;
                document.getElementById('edit-tempat').value = eventData.tempat;
                document.getElementById('edit-tanggal').value = eventData.tanggal_kegiatan.split(' ')[0];
                document.getElementById('edit-deskripsi').value = eventData.deskripsi_kegiatan;
                
                // Tampilkan modal
                document.getElementById('modalEditEvent').style.display = 'block';
                document.body.classList.add('modal-open');
            } catch (error) {
                console.error('Error:', error);
                Swal.fire('Error', 'Gagal memuat data event', 'error');
            }
        }

        // Fungsi untuk menutup modal edit
        function closeEditModal() {
            document.getElementById('modalEditEvent').style.display = 'none';
            document.body.classList.remove('modal-open');
        }

        // Fungsi untuk modal tambah
        function openTambahModal() {
            document.getElementById('modalTambahEvent').style.display = 'block';
            document.body.classList.add('modal-open');
        }

        function closeTambahModal() {
            document.getElementById('modalTambahEvent').style.display = 'none';
            document.body.classList.remove('modal-open');
        }

        // Fungsi konfirmasi hapus
        function confirmDelete(id) {
            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: "Data event ini akan dihapus permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'hapus_event.php?id=' + encodeURIComponent(id);
                }
            });
        }

        // Event listener untuk tombol edit
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.btn-edit').forEach(button => {
                button.addEventListener('click', function() {
                    const eventId = this.getAttribute('data-event-id');
                    openEditModal(eventId);
                });
            });
            
            // Tutup modal ketika klik di luar area modal
            window.addEventListener('click', function(event) {
                if (event.target.classList.contains('modal')) {
                    closeEditModal();
                    closeTambahModal();
                }
            });

            // Auto-hide notifikasi setelah 5 detik
            const alert = document.querySelector('.alert-notification');
            if (alert) {
                setTimeout(() => {
                    alert.style.display = 'none';
                }, 5000);
            }

            // Back to top button
            window.addEventListener('scroll', function() {
                const backToTop = document.getElementById('backToTop');
                if (window.pageYOffset > 300) {
                    backToTop.classList.add('show');
                } else {
                    backToTop.classList.remove('show');
                }
            });

            document.getElementById('backToTop').addEventListener('click', function() {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>