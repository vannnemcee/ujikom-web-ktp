<?php
include "config/koneksi.php";


$total_penduduk = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM penduduk"))['total'];
$total_kelurahan = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(DISTINCT id_kelurahan) AS total FROM penduduk"))['total'];
$total_kecamatan = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(DISTINCT k.id_kecamatan) AS total FROM penduduk p LEFT JOIN kelurahan k ON p.id_kelurahan = k.id_kelurahan"))['total'];
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard KTP</title>
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>
    <header class="site-header">
        <div class="topbar">
            <div class="brand">
                <h1>Website Data Kependudukan</h1>
                <p>Sistem Pengelolaan Data KTP</p>
            </div>
            <nav class="navbar">
                <a class="active" href="index.php">Dashboard</a>
                <a href="input_penduduk.php">Input Penduduk</a>
                <a href="hasil_penduduk.php">Data Penduduk</a>
            </nav>
        </div>
    </header>

    <main class="container">
        <div class="page-heading">
            <h2>Dashboard</h2>
            <p>Ringkasan data kependudukan.</p>
        </div>
        
        <section class="stats">
            <article class="stat-card">
                <strong><?= $total_penduduk; ?></strong>
                <span>Total Penduduk</span>
            </article>
            <article class="stat-card">
                <strong><?= $total_kelurahan; ?></strong>
                <span>Kelurahan</span>
            </article>
            <article class="stat-card">
                <strong><?= $total_kecamatan; ?></strong>
                <span>Kecamatan</span>
            </article>
        </section>


        <section class="dashboard-grid">
            <a class="panel menu-card" href="input_penduduk.php">
                <span>01</span>
                <h3>Input Penduduk</h3>
                <p>Tambah data KTP baru.</p>
            </a>
            <a class="panel menu-card" href="hasil_penduduk.php">
                <span>02</span>
                <h3>Data Penduduk</h3>
                <p>Lihat dan kelola data penduduk.</p>
            </a>
        </section>
    </main>

    <footer>Website KTP &copy; 2026</footer>
</body>

</html>