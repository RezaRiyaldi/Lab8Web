<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'db_barang');

if ($koneksi == false) {
    echo "Koneksi gagal";
    die();
} 

// var_dump($koneksi);