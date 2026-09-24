<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Penduduk</title>
    <link rel="stylesheet" href="assets/style.css">

</head>

<body>
    <?php

    include "config/koneksi.php";

    ?>
    <header class="site-header"><div class="topbar">
            <div class="brand"><h1>Website Data Kependudukan</h1><p>Versi UI dengan CSS, belum terhubung database</p></div>
            <nav class="navbar"><a href="index.html">Dashboard</a><a class="active" href="input_penduduk.php">Input Penduduk</a><a href="hasil_penduduk.php">Data Penduduk</a></nav>
        </div></header>
    <main class="container">
    <h2>Input Penduduk</h2>
    <FORM method="POST" action="hasil_penduduk.php">
        <article class="stat-card">
                <label>NIK:</label><br>
                <input type="text" name="nik" width="10" placeholder="Masukkan NIK"><br>

                <label>Nama Lengkap:</label></br>
                <input type="text" name="nama_lengkap" placeholder="Masukkan Nama"><br>

                <label>Tempat Lahir:</label><br>
                <input type="text" name="tempat_lahir" placeholder="Contoh : Bandung" width="10"><br>

                <label>Tanggal Lahir:</label><br>
                <input type="date" name="tgl_pinjam" width="10"><br>

                <label>Jenis Kelamin:</label>
                <input type="radio" name="jenis_kelamin" value="LAKI-LAKI">LAKI-LAKI<br>
                <input type="radio" name="jenis_kelamin" value="PEREMPUAN">PEREMPUAN<br>

                <label>Golongan Darah:</label><br>
                    <select name="gol_darah">
                        <option value="">- Pilih Golongan Darah -</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="AB">AB</option>
                        <option value="O">O</option>
                    </select>

                <label>Alamat Jalan:</label><br>
                <input type="text" name="alamat_jalan" placeholder="Masukkan RT">

                <label>RT:</label><br>
                <input type="text" name="rt" placeholder="Masukkan RT">

                <label>RW:</label><br>
                <input type="text" name="rw" placeholder="Masukkan RW">
                
                <label>Status Perkawinana:</label><br>
                <select name="status_perkawinan">
                    <option value="BELUM KAWIN">BELUM KAWIN</option>
                    <option value="KAWIN">KAWIN</option>
                </select><br>
                
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
</main>
        <footer>KTP</footer>
</body>

</html>