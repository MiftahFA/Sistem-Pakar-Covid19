<?php
include '../../Database/database.php';
session_start();
$id_hapus = $_POST['id_hapus'];
$query = mysqli_query($connect, "DELETE from penyakit WHERE id_penyakit='$id_hapus'");
if ($query) {
    header("Location: ../penyakit.php");
    $_SESSION['berhasil'] = "Kriteria Berhasil Dihapus";
} else {
    header("Location: ../penyakit.php");
    $_SESSION['gagal'] = "Kriteria Gagal Dihapus";
}
