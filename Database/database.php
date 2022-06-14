<?php

$host  = 'localhost';
$user  = 'root';
$pass  = '';
$db    = 'sistem_pakar';

$connect = new mysqli($host, $user, $pass, $db);
if ($connect->connect_error) {
    echo 'Connection Error';
}
