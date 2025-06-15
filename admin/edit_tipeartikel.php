<?php
require '../database/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_tipe = $_POST['id_tipe'];
    $nama_tipe = mysqli_real_escape_string($koneksi, $_POST['nama_tipe']);
    $deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);

    $sql = "UPDATE tipe_artikel SET 
                nama_tipe = '$nama_tipe', 
                deskripsi = '$deskripsi' 
            WHERE id_tipe = '$id_tipe'";

    if (mysqli_query($koneksi, $sql)) {
        header("Location: tipeartikel.php?edit=sukses");
    } else {
        header("Location: tipeartikel.php?edit=gagal");
    }
}
?>
