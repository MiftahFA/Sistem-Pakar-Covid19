<?php
include '../../Database/database.php';
session_start();
$id_edit = $_POST['id_edit'];
$kriteria_penyakit = $_POST['penyakit'];
$detail = $_POST['detail'];
$saran = $_POST['saran'];
$query = mysqli_query($connect, "UPDATE penyakit SET kriteria_penyakit='$kriteria_penyakit', detail='$detail', saran='$saran' WHERE id_penyakit='$id_edit'");
if ($query) {
    header("Location: ../penyakit.php");
    $_SESSION['berhasil'] = "Kriteria Berhasil Diperbaharui";
} else {
    header("Location: ../penyakit.php");
    $_SESSION['gagal'] = "Kriteria Gagal diperbaharui";
}
