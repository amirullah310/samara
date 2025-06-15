<?php
require '../database/koneksi.php';

// Validasi input
$requiredFields = ['id_kegiatan', 'nama_kegiatan', 'tempat', 'tanggal_kegiatan', 'deskripsi_kegiatan'];
foreach ($requiredFields as $field) {
    if (!isset($_POST[$field]) || empty($_POST[$field])) {
        header("Location: event.php?pesan=error");
        exit;
    }
}

// Escape input untuk mencegah SQL injection
$id = mysqli_real_escape_string($koneksi, $_POST['id_kegiatan']);
$nama = mysqli_real_escape_string($koneksi, $_POST['nama_kegiatan']);
$tempat = mysqli_real_escape_string($koneksi, $_POST['tempat']);
$tanggal = mysqli_real_escape_string($koneksi, $_POST['tanggal_kegiatan']);
$deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi_kegiatan']);

// Insert data ke database
$query = "INSERT INTO kegiatan (id_kegiatan, nama_kegiatan, tempat, tanggal_kegiatan, deskripsi_kegiatan) 
          VALUES (?, ?, ?, ?, ?)";
$stmt = $koneksi->prepare($query);
$stmt->bind_param("sssss", $id, $nama, $tempat, $tanggal, $deskripsi);

if ($stmt->execute()) {
    header("Location: event.php?pesan=tambah_berhasil");
} else {
    header("Location: event.php?pesan=error");
}

$stmt->close();
$koneksi->close();
exit;