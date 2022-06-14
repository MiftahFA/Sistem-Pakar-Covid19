<?php
include '../../Database/database.php';
session_start();
$id_penyakit = $_POST['id_penyakit'];
$id_gejala = $_POST['id_gejala'];
$query = mysqli_query($connect, "INSERT INTO basispengetahuan(id_penyakit, id_gejala) VALUES('$id_penyakit','$id_gejala')");
if ($query) {
    header("Location: ../basispengetahuan.php");
    $_SESSION['berhasil'] = "Basis Pengetahuan Berhasil Ditambahkan";
} else {
    header("Location: ../basispengetahuan.php");
    $_SESSION['gagal'] = "Basis Pengetahuan Gagal Ditambahkan";
}
