<?php
$koneksi = mysqli_connect("localhost","root","","db_samara");

function query($query){
    global $koneksi;
    $result = mysqli_query($koneksi,$query);
    $rows =[];
    while($user = mysqli_fetch_assoc($result)){
        $rows[] = $user;
    }
    return $rows;
};

?>