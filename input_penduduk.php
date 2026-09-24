<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Pekerja</title>
    <link rel="stylesheet" href="assets/style.css">

</head>

<body>
    <?php

    include "config/koneksi.php";

    ?>
    <header class="site-header"><div class="topbar">
            <div class="brand"><h1>Perpustakaan XI</h1><p>Versi UI dengan CSS, belum terhubung database</p></div>
            <nav class="navbar"><a href="index.html">Dashboard</a><a href="input_data_kategori_buku.php">Kategori</a><a href="input_buku.php">Buku</a><a class="active" href="input_peminjaman_buku.php">Peminjaman</a></nav>
        </div></header>
    <main class="container">
    <h2>Input Peminjaman</h2>
    <FORM method="POST" action="#">
        <article class="stat-card">
                <input type="hidden" name="id_peminjaman" width="10">

                <label>Buku:</label><br>
                    <select name="id_buku">
                        <option value="">- Pilih Buku -</option>
                        <?php
                        $queri = "SELECT id_buku, judul
                                  from buku";
                        $ambil = mysqli_query($koneksi, $queri);
                        while ($data = mysqli_fetch_assoc($ambil)) {
                        ?>
                            <option value="<?php echo $data['id_buku']; ?>"><?php echo $data['judul'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                <label>NIS:</label><br>
                <input type="text" name="nis" width="10"><br>

                <label>Nama Peminjam:</label></br>
                <input type="text" name="nama_peminjam"><br>

                <label>Kelas:</label><br>
                <input type="text" name="kelas" placeholder="XI PPLG 1" width="10"><br>

                <label>Tanggal Peminjaman:</label><br>
                <input type="date" name="tgl_pinjam" width="10"><br>

                <label>Kembali:</label><br>
                <input type="date" name="tgl_kembali" width="10"><br>

                <label>Status:</label><br>
                    <select name="status">
                        <option value="Dipinjam">Dipinjam</option>
                        <option value="Dikembalikan">Dikembalikan</option>
                        <option value="Terlambat">Terlambat</option>
                    </select>

                <label>Catatan:</label><br>
                <textarea name="catatan" cols="50"></textarea>

                <input type="submit" name="simpan" value="Simpan">
                <input type="reset" value="Kosongkan">
        </article>
    </FORM>
    </main>
    <hr>
    <main class="container">
    <h2>Daftar Peminjaman</h2>
    <?php

    if (isset($_POST['simpan'])) {
        $ID_PEMINJAMAN = $_POST['id_peminjaman'];
        $ID_BUKU = $_POST['id_buku'];
        $NIS = $_POST['nis'];
        $NAMA_PEMINJAM = $_POST['nama_peminjam'];
        $KELAS = $_POST['kelas'];
        $TGL_PINJAM = $_POST['tgl_pinjam'];
        $TGL_KEMBALI = $_POST['tgl_kembali'];
        $STATUS = $_POST['status'];
        $CATATAN = $_POST['catatan'];

        $queri = "INSERT INTO peminjaman (id_peminjaman, id_buku, nis, nama_peminjam, kelas, tanggal_pinjam, tanggal_kembali, status, catatan)
               VALUES ('$ID_PEMINJAMAN', '$ID_BUKU', '$NIS', '$NAMA_PEMINJAM', '$KELAS', '$TGL_PINJAM', '$TGL_KEMBALI', '$STATUS', '$CATATAN')";
        $asup = mysqli_query($koneksi, $queri);
        if ($asup) {
            echo "Data berhasil ditambahkan";
        } else {
            die("koneksi eror:" . mysqli_error($koneksi));
        }
    } else {
        echo "Silahkan untuk menginput untuk menambahkan data";
    }
    ?>
    <table border="1" cellpadding="5">
        <tr align="center">
            <th>No.</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Buku</th>
            <th>Tanggal Pinjam</th>
            <th>Kembali</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
        <?php
        $n = 1;
        $queri = "SELECT peminjaman.*, buku.judul FROM peminjaman JOIN buku ON peminjaman.id_buku = buku.id_buku";
        $hasil = mysqli_query($koneksi, $queri);
        if (!$hasil) {
            die("eror :" . mysqli_connect_error());
        }
        while ($datanya = mysqli_fetch_assoc($hasil)) {

        ?>
            <tr>
                <td><?php echo $n++; ?></td>
                <td><?php echo $datanya['nis']; ?></td>
                <td><?php echo $datanya['nama_peminjam']; ?></td>
                <td><?php echo $datanya['kelas']; ?></td>
                <td><?php echo $datanya['judul']; ?></td>
                <td><?php echo $datanya['tanggal_pinjam']; ?></td>
                <td><?php echo $datanya['tanggal_kembali']; ?></td>
                <td><?php echo $datanya['status']; ?></td>
                <td>
                    <a href="update_peminjaman_buku.php?id=<?php echo $datanya['id_peminjaman']; ?>">Ubah</a> |
                    <a href="hapus_peminjaman_buku.php?id=<?php echo $datanya['id_peminjaman']; ?>">Hapus</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</main>
        <footer>Perpustakaan Web Kelas XI - Evan Angga Subagja</footer>
</body>

</html>