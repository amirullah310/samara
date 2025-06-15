<?php
require '../database/koneksi.php';

if (!isset($_GET['id'])) {
    header("Location: tipeartikel.php?hapus=tidakadaid");
    exit;
}

$id = $_GET['id'];

// Cek apakah id_tipe sedang digunakan di tabel artikel
$cek = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM artikel WHERE id_tipe = '$id'");
$data = mysqli_fetch_assoc($cek);

if ($data['total'] > 0) {
    // Tipe artikel masih digunakan, tidak boleh dihapus
    header("Location: tipeartikel.php?hapus=dipakai");
    exit;
}

// Coba hapus jika tidak dipakai
$hapus = mysqli_query($koneksi, "DELETE FROM tipe_artikel WHERE id_tipe = '$id'");

if ($hapus) {
    header("Location: tipeartikel.php?hapus=sukses");
} else {
    header("Location: tipeartikel.php?hapus=gagal");
}
?>
