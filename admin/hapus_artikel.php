<?php
require '../database/koneksi.php';

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($koneksi, $_GET['id']);

    $cek = mysqli_query($koneksi, "SELECT * FROM artikel WHERE id_artikel = '$id'");
    if (mysqli_num_rows($cek) > 0) {
        $hapus = mysqli_query($koneksi, "DELETE FROM artikel WHERE id_artikel = '$id'");

        if ($hapus) {
            header("Location: artikel.php?hapus=sukses");
        } else {
            header("Location: artikel.php?hapus=gagal");
        }
    } else {
        header("Location: artikel.php?hapus=tidakditemukan");
    }
} else {
    header("Location: artikel.php?hapus=tidakadaid");
}
exit;
?>
