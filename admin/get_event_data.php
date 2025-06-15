<?php
require '../database/koneksi.php';

header('Content-Type: application/json');

if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo json_encode(['error' => 'ID tidak valid']);
    exit;
}

$id = $_GET['id'];
$query = "SELECT * FROM kegiatan WHERE id_kegiatan = ?";
$stmt = $koneksi->prepare($query);
$stmt->bind_param("s", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $event = $result->fetch_assoc();
    // Format tanggal untuk input type date
    $event['tanggal_kegiatan'] = date('Y-m-d', strtotime($event['tanggal_kegiatan']));
    echo json_encode($event);
} else {
    echo json_encode(['error' => 'Event tidak ditemukan']);
}

$stmt->close();
$koneksi->close();
?>