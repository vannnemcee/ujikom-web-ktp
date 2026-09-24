<?php

$host = "localhost";
$user = "root";
$pass = "";
$DB = "ktp";

$koneksi = mysqli_connect($host, $user, $pass, $DB);

if (!$koneksi) {
    die("koneksi error : " .mysqli_connect_error());
}

?>