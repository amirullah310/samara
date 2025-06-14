<?php
session_start();
include '../database/koneksi.php';

// Ambil input
$id_admin = $_POST['id_admin'];
$password = $_POST['password'];

// Query login
$login = mysqli_query($koneksi, "SELECT * FROM admin WHERE id_admin='$id_admin' AND password='$password'");
$cek = mysqli_num_rows($login);

if ($cek > 0) {
    $data = mysqli_fetch_assoc($login);

    // Set session
    $_SESSION['id_admin'] = $id_admin;

    // Update waktu login terakhir
    $now = date('Y-m-d H:i:s');
    mysqli_query($koneksi, "UPDATE admin SET last_login = '$now' WHERE id_admin = '$id_admin'");


    // Redirect ke dashboard
    header("location:index.php");
    exit;
} else {
    // Jika login gagal
    echo "
        <script>
            alert('User tidak ditemukan atau password salah');
            document.location.href = 'login.php';
        </script>
    ";
    exit;
}
?>
