<?php
session_start();
include '../Database/database.php';
if (isset($_POST['id'])) {
    $query = mysqli_query($connect, "SELECT * FROM basispengetahuan where id_basispengetahuan='" . $_POST['id'] . "'");
    $row = mysqli_fetch_array($query);
    echo json_encode($row);
}
