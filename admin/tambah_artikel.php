<?php
session_start();
require '../database/koneksi.php';

if (!isset($_SESSION['id_admin'])) {
    header("Location: login.php");
    exit;
}

// Ambil data dari form
$id_artikel = $_POST['id_artikel'];
$judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
$deskripsi_singkat = mysqli_real_escape_string($koneksi, $_POST['deskripsi_singkat']);
$isi = mysqli_real_escape_string($koneksi, $_POST['isi']);
$status = $_POST['status'];
$id_admin = $_SESSION['id_admin'];
$id_tipe = $_POST['id_tipe'];

// Upload gambar
$gambar = $_FILES['gambar']['name'];
$tmp = $_FILES['gambar']['tmp_name'];
$folder = '../img/';
$path_gambar = $folder . $gambar;

if (move_uploaded_file($tmp, $path_gambar)) {
    // Simpan ke database
    $query = "INSERT INTO artikel 
        (id_artikel, judul, deskripsi_singkat, isi, status, id_admin, id_tipe, gambar)
        VALUES 
        ('$id_artikel', '$judul', '$deskripsi_singkat', '$isi', '$status', '$id_admin', '$id_tipe', '$path_gambar')";

    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "<script>
            alert('Artikel berhasil ditambahkan!');
            window.location.href = 'artikel.php';
        </script>";
    } else {
        echo "<script>
            alert('Gagal menambahkan artikel.');
            window.history.back();
        </script>";
    }
} else {
    echo "<script>
        alert('Upload gambar gagal.');
        window.history.back();
    </script>";
}

?>
