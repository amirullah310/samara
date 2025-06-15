<?php
session_start();
require '../database/koneksi.php';

if (isset($_SESSION['id_admin'])) {
    // Update status offline
    $stmt = query(
        "UPDATE admin SET is_online = 0 WHERE id_admin = ?",
        [$_SESSION['id_admin']]
    );
    $stmt->close();
    
    // Hancurkan session
    session_unset();
    session_destroy();
}

header("Location: login.php");
exit();
?>