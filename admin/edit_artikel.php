<?php
require '../database/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_artikel = $_POST['id_artikel'];
    $judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi_singkat']);
    $isi = mysqli_real_escape_string($koneksi, $_POST['isi']);
    $status = $_POST['status'];
    $id_tipe = $_POST['id_tipe'];

    $gambarPath = '';

    // Cek apakah gambar baru diunggah
    if (!empty($_FILES['gambar']['name'])) {
        $gambarName = time() . '-' . $_FILES['gambar']['name'];
        $gambarTmp = $_FILES['gambar']['tmp_name'];
        $gambarPath = 'upload_artikel/' . $gambarName;
        move_uploaded_file($gambarTmp, '../' . $gambarPath);

        $sql = "UPDATE artikel SET 
            judul = '$judul',
            deskripsi_singkat = '$deskripsi',
            isi = '$isi',
            status = '$status',
            id_tipe = '$id_tipe',
            gambar = '$gambarPath'
            WHERE id_artikel = '$id_artikel'";
    } else {
        $sql = "UPDATE artikel SET 
            judul = '$judul',
            deskripsi_singkat = '$deskripsi',
            isi = '$isi',
            status = '$status',
            id_tipe = '$id_tipe'
            WHERE id_artikel = '$id_artikel'";
    }

    if (mysqli_query($koneksi, $sql)) {
        header("Location: artikel.php?edit=sukses");
    } else {
        header("Location: artikel.php?edit=gagal");
    }
}
?>
