<?php
include 'Database/database.php';
session_start();
$id_riwayat = uniqid();
$tanggal = time();
$nama = $_POST['nama'];
$umur = $_POST['umur'];
$jk = $_POST['jk'];
$alamat = $_POST['alamat'];
$_SESSION['id_riwayat'] = $id_riwayat;

$query = mysqli_query($connect, "INSERT INTO riwayat(id_riwayat, tanggal, nama, umur, jenis_kelamin, alamat) 
VALUES('$id_riwayat','$tanggal','$nama','$umur', '$jk', '$alamat')");

if ($query) {
    header("Location: diagnosa.php");
} else {
    header("Location: konsultasi.php");
}
