<?php
session_start();

include '../database/koneksi.php';

$id_admin = $_POST['id_admin'];
$password = $_POST['password'];


$login = mysqli_query($koneksi, "SELECT * FROM admin WHERE id_admin='$id_admin' and password='$password'");

$cek = mysqli_num_rows($login);

if ($cek > 0) {
    $data = mysqli_fetch_assoc($login);

    $_SESSION['id_admin'] = $id_admin;
    $_SESSION['password'] = $password;
    header("location:index.php");
}
;
if (isset($_POST['tambah'])) {

    if (($_POST)>0){
        echo "
        <script>
        alert('User Tidak Di Temukan');
        document.location.href = 'login.php';
        </script>
        ";
    }
    return mysqli_affected_rows($koneksi);
}


?>