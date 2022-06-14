<?php
session_start();
include '../Database/database.php';
if (isset($_POST['id'])) {
    $query = mysqli_query($connect, "SELECT riwayat.*, penyakit.kriteria_penyakit FROM riwayat INNER JOIN hasil
    ON riwayat.id_riwayat = hasil.id_riwayat INNER JOIN penyakit ON penyakit.id_penyakit = hasil.id_penyakit where riwayat.id_riwayat='" . $_POST['id'] . "'");
    $row = mysqli_fetch_array($query);
    echo json_encode($row);
}
