<?php
require '../database/koneksi.php';

// Validasi input
if (!isset($_POST['id_kegiatan']) || empty($_POST['id_kegiatan'])) {
    header("Location: event.php?pesan=error");
    exit;
}

// Escape input untuk mencegah SQL injection
$id = mysqli_real_escape_string($koneksi, $_POST['id_kegiatan']);
$nama = mysqli_real_escape_string($koneksi, $_POST['nama_kegiatan']);
$tempat = mysqli_real_escape_string($koneksi, $_POST['tempat']);
$tanggal = mysqli_real_escape_string($koneksi, $_POST['tanggal_kegiatan']);
$deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi_kegiatan']);

// Update data ke database
$query = "UPDATE kegiatan SET 
            nama_kegiatan = ?,
            tempat = ?,
            tanggal_kegiatan = ?,
            deskripsi_kegiatan = ?
          WHERE id_kegiatan = ?";
$stmt = $koneksi->prepare($query);
$stmt->bind_param("sssss", $nama, $tempat, $tanggal, $deskripsi, $id);

if ($stmt->execute()) {
    header("Location: event.php?pesan=update_berhasil");
} else {
    header("Location: event.php?pesan=error");
}

$stmt->close();
$koneksi->close();
exit;