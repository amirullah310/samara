<?php
require '../database/koneksi.php';

if (!isset($_GET['id'])) {
  header("Location: event.php?hapus=tidakadaid");
  exit;
}

$id = $_GET['id'];
$event = query("SELECT * FROM kegiatan WHERE id_kegiatan = '$id'");

if (!$event) {
  header("Location: event.php?hapus=tidakditemukan");
  exit;
}

$hapus = mysqli_query($koneksi, "DELETE FROM kegiatan WHERE id_kegiatan = '$id'");
if ($hapus) {
  header("Location: event.php?hapus=sukses");
} else {
  header("Location: event.php?hapus=gagal");
}
exit;
?>
