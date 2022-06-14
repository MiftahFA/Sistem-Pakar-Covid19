<?php
include '../../Database/database.php';
session_start();
$no_urut = $_POST['nomer'];
$kriteria_penyakit = $_POST['penyakit'];
$detail = $_POST['detail'];
$saran = $_POST['saran'];
$query = mysqli_query($connect, "INSERT INTO penyakit(id_penyakit, kriteria_penyakit, detail, saran) 
    VALUES('$no_urut','$kriteria_penyakit','$detail','$saran')");
if ($query) {
    header("Location: ../penyakit.php");
    $_SESSION['berhasil'] = "Kriteria Berhasil Ditambahkan";
} else {
    header("Location: ../penyakit.php");
    $_SESSION['gagal'] = "Kriteria Gagal Ditambahkan";
}
