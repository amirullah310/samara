<?php
session_start();
require '../database/koneksi.php';

// Validasi input
if (empty($_POST['id_admin']) || empty($_POST['password'])) {
    die(json_encode([
        'status' => 'error',
        'message' => 'ID Admin dan Password harus diisi'
    ]));
}

$id_admin = trim($_POST['id_admin']);
$password = $_POST['password'];

// Gunakan prepared statement untuk mencegah SQL injection
$stmt = $koneksi->prepare("SELECT id_admin, nama_admin, password FROM admin WHERE id_admin = ?");
if (!$stmt) {
    die(json_encode([
        'status' => 'error',
        'message' => 'Prepare statement failed: ' . $koneksi->error
    ]));
}

$stmt->bind_param("s", $id_admin);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    // Log attempt (opsional)
    error_log("Login attempt failed for ID: $id_admin");
    
    // Berikan respons yang sama untuk user tidak ditemukan dan password salah (security best practice)
    $_SESSION['login_error'] = 'ID Admin atau Password salah';
    header("Location: login.php");
    exit();
}

$admin = $result->fetch_assoc();

// Verifikasi password (asumsi password di-hash)
if (password_verify($password, $admin['password'])) {
    // Set session data
    $_SESSION['id_admin'] = $admin['id_admin'];
    $_SESSION['nama_admin'] = $admin['nama_admin'];
    $_SESSION['login_time'] = time();
    
    // Regenerate session ID untuk mencegah session fixation
    session_regenerate_id(true);
    
    // Update last login dan set status online
    $update = $koneksi->prepare("UPDATE admin SET last_login = NOW(), is_online = 1 WHERE id_admin = ?");
    $update->bind_param("s", $admin['id_admin']);
    $update->execute();
    $update->close();
    
    // Set cookie secure jika menggunakan HTTPS
    if (isset($_SERVER['HTTPS'])) {
        ini_set('session.cookie_secure', 1);
    }
    ini_set('session.cookie_httponly', 1);
    ini_set('session.use_strict_mode', 1);
    
    // Redirect ke dashboard
    header("Location: index.php");
    exit();
} else {
    // Password tidak match
    $_SESSION['login_error'] = 'ID Admin atau Password salah';
    header("Location: login.php");
    exit();
}

$stmt->close();
?>