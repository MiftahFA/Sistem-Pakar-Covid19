<?php
include '../../Database/database.php';
session_start();
$no_urut = $_POST['nomer'];
$gejala = $_POST['gejala'];
$query = mysqli_query($connect, "INSERT INTO gejala(id_gejala, gejala) 
    VALUES('$no_urut','$gejala')");
if ($query) {
    header("Location: ../gejala.php");
    $_SESSION['berhasil'] = "Gejala Berhasil Ditambahkan";
} else {
    header("Location: ../gejala.php");
    $_SESSION['gagal'] = "Gejala Gagal Ditambahkan";
}
