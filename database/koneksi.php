<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_samara");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Fungsi query yang aman
function query($sql, $params = []) {
    global $koneksi;
    
    if ($params) {
        $stmt = $koneksi->prepare($sql);
        if (!$stmt) {
            die("Prepare failed: " . $koneksi->error);
        }
        
        $types = str_repeat('s', count($params));
        $stmt->bind_param($types, ...$params);
        $stmt->execute();
        return $stmt;
    } else {
        $result = mysqli_query($koneksi, $sql);
        if (!$result) {
            die("Query failed: " . mysqli_error($koneksi));
        }
        return $result;
    }
}