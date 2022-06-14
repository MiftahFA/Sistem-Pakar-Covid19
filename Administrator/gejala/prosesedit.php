<?php
include '../../Database/database.php';
session_start();
$id_edit = $_POST['id_edit'];
$gejala = $_POST['gejala'];
$query = mysqli_query($connect, "UPDATE gejala SET gejala='$gejala' WHERE id_gejala='$id_edit'");
if ($query) {
    header("Location: ../gejala.php");
    $_SESSION['berhasil'] = "Gejala Berhasil Diperbaharui";
} else {
    header("Location: ../gejala.php");
    $_SESSION['gagal'] = "Gejala Gagal diperbaharui";
}
