<?php
include "config/koneksi.php";

$NIK = $_GET['nik'];
$queri = "DELETE FROM penduduk WHERE nik = '$NIK'";

$hapus = mysqli_query($koneksi, $queri);
if ($hapus) {
    header("Location: hasil_penduduk.php");
    exit;
} else {
    die("Data gagal dihapus: " . mysqli_error($koneksi));
}
?>
