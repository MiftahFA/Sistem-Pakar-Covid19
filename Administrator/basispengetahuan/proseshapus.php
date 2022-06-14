<?php
include '../../Database/database.php';
session_start();
$id_hapus = $_POST['id_hapus'];
$query = mysqli_query($connect, "DELETE from basispengetahuan WHERE id_basispengetahuan='$id_hapus'");
if ($query) {
    header("Location: ../basispengetahuan.php");
    $_SESSION['berhasil'] = "Basis Pengetahuan Berhasil Dihapus";
} else {
    header("Location: ../basispengetahuan.php");
    $_SESSION['gagal'] = "Basis Pengetahuan Gagal Dihapus";
}
