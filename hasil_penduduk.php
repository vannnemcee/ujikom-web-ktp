<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard KTP - UI CSS</title>
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
                <a href="index.php">Dashboard</a>
                <a href="input_penduduk.php">Input Penduduk</a>
                <a class="active" href="hasil_penduduk.php">Data Penduduk</a>
            </nav>
        </div>
    </header>
    <table border="1">
        <tr>
            <th>No.</th>
            <th>Nik</th>
            <th>Nama lengkap</th>
            <th>Tempat tanggal lahir</th>
            <th>Jenis kelamin</th>
            <th>Gol darah</th>
            <th>Alamat jalan</th>
            <th>Rt</th>
            <th>Rw</th>
            <th>Kecamatan</th>
            <th>Kelurahan</th>
            <th>Agama</th>
            <th>Pekerjaan</th>
            <th>Status perkawinan</th>
            <th>Kewarganegaraan</th>
            <th>Masa berlaku</th>
            <th>Aksi</th>
        </tr>
        <?php
        include "config/koneksi.php";

        $query = "SELECT p.*, 
                         k.nama_kelurahan, 
                         kc.nama_kecamatan, 
                         a.nama_agama, 
                         pek.nama_pekerjaan
                  FROM penduduk p
                  LEFT JOIN kelurahan k ON p.id_kelurahan = k.id_kelurahan
                  LEFT JOIN kecamatan kc ON k.id_kecamatan = kc.id_kecamatan
                  LEFT JOIN agama a ON p.id_agama = a.id_agama
                  LEFT JOIN pekerjaan pek ON p.id_pekerjaan = pek.id_pekerjaan";

        $hasil = mysqli_query($koneksi, $query);
        $i = 1;

        while ($data = mysqli_fetch_assoc($hasil)) {
        ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $data['nik']; ?></td>
                <td><?php echo $data['nama_lengkap']; ?></td>
                <td><?php echo $data['tempat_lahir'] . ", " . $data['tanggal_lahir']; ?></td>
                <td><?php echo $data['jenis_kelamin']; ?></td>
                <td><?php echo $data['gol_darah']; ?></td>
                <td><?php echo $data['alamat_jalan']; ?></td>
                <td><?php echo $data['rt']; ?></td>
                <td><?php echo $data['rw']; ?></td>
                <td><?php echo $data['nama_kecamatan']; ?></td>
                <td><?php echo $data['nama_kelurahan']; ?></td>
                <td><?php echo $data['nama_agama']; ?></td>
                <td><?php echo $data['nama_pekerjaan']; ?></td>
                <td><?php echo $data['status_perkawinan']; ?></td>
                <td><?php echo $data['kewarganegaraan']; ?></td>
                <td><?php echo $data['masa_berlaku']; ?></td>
                <td>
                    <a href="update_penduduk.php?nik=<?php echo $data['nik']; ?>">Ubah</a> ||
                    <a href="hapus_penduduk.php?nik=<?php echo $data['nik']; ?>" onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
                </td>
            </tr>
        <?php
            $i++;
        }
        ?>
    </table>
    <footer>Website KTP &copy; 2026</footer>
</body>
</html>