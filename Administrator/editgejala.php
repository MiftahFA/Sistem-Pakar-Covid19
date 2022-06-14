<?php
session_start();
include '../Database/database.php';
if (isset($_POST['id'])) {
    $query = mysqli_query($connect, "SELECT * from gejala where id_gejala='" . $_POST['id'] . "'");
    $row = mysqli_fetch_array($query);
    echo json_encode($row);
}
