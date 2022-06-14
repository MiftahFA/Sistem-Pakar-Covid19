<?php
include '../../Database/database.php';
session_start();
$id_hapus = $_POST['id_hapus'];
$query = mysqli_query($connect, "DELETE from gejala WHERE id_gejala='$id_hapus'");
if ($query) {
    header("Location: ../gejala.php");
    $_SESSION['berhasil'] = "Gejala Berhasil Dihapus";
} else {
    header("Location: ../gejala.php");
    $_SESSION['gagal'] = "Gejala Gagal Dihapus";
}
