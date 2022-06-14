<?php
include '../../Database/database.php';
session_start();
$id_edit = $_POST['id_edit'];
$id_penyakit = $_POST['id_penyakit'];
$id_gejala = $_POST['id_gejala'];
$query = mysqli_query($connect, "UPDATE basispengetahuan SET id_penyakit='$id_penyakit', id_gejala='$id_gejala' WHERE id_basispengetahuan='$id_edit'");
if ($query) {
    header("Location: ../basispengetahuan.php");
    $_SESSION['berhasil'] = "Basis Pengetahuan Berhasil Diperbaharui";
} else {
    header("Location: ../basispengetahuan.php");
    $_SESSION['gagal'] = "Basis Pengetahuan Gagal diperbaharui";
}
