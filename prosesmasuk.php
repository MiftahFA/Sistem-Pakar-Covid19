<?php
include 'Database/database.php';
session_start();
$username = mysqli_real_escape_string($connect, $_POST['username']);
$password = mysqli_real_escape_string($connect, md5($_POST['password']));

$query    = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
$runquery = $connect->query($query);
$hasil = $runquery->fetch_assoc();

if ($runquery->num_rows > 0) {
    session_start();
    $_SESSION['username'] = $username;
    header("Location: Administrator/index.php");
} else {
    header("Location: masuk.php");
    $_SESSION['status'] = "Username atau Password Salah";
}
