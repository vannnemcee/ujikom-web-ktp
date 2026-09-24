<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard KTP - UI CSS</title>
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>
    <header class="site-header"><div class="topbar">
            <div class="brand"><h1>Website Data Kependudukan</h1><p>Versi UI dengan CSS, belum terhubung database</p></div>
            <nav class="navbar"><a class="active" href="index.html">Dashboard</a><a href="input_penduduk.php">Input Penduduk</a><a href="hasil_penduduk.php">Data Penduduk</a></nav>
        </div></header>
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
        
        $query = "SELECT * FROM penduduk";
        $i=1;
        
        $hasil = mysqli_query($koneksi, $query);

        while ($data = mysqli_fetch_assoc($hasil)) {
            $nik =$data['nik'];
            $id_agama = $data['id_agama'];
            $id_kelurahan = $data['id_kelurahan'];
            $id_pekerjaan = $data['id_pekerjaan'];

            // $penduduk = "SELECT nama_ kecamatan, nama_kelurahan, nama_agama, nama_pekerjaan, status_perkawinan,kewarganegaraan, masa_berlaku FROM kategori WHERE id_agama = '$id_agama'";

            // $hasil_pen = mysqli_query($koneksi, $penduduk);
            // $data1 = mysqli_fetch_assoc($hasil_pen);

        ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $data['nik']; ?></td>
                <td><?php echo $data['nama_lengkap']; ?></td>
                <td><?php echo $data['tempat_lahir.tanggal_lahir']; ?></td>
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
                    <a href="ubahb.php?id=<?php echo $data['id_buku'];?>">Ubah</a> || 
                    <a href="hapusb.php?id=<?php echo $data['id_buku'];?>">Hapus</a>
                </td>
            </tr>
        <?php 
        $i++;
        } ?>
    </table>
     
</body>
</html>