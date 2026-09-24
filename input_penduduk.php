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
    <header class="site-header">
        <div class="topbar">
            <div class="brand">
                <h1>Website Data Kependudukan</h1>
                <p>Versi UI dengan CSS, belum terhubung database</p>
            </div>
            <nav class="navbar"><a href="index.html">Dashboard</a><a class="active" href="input_penduduk.php">Input Penduduk</a><a href="hasil_penduduk.php">Data Penduduk</a></nav>
        </div>
    </header>
    <main class="container">
        <h2>Input Penduduk</h2>
        <FORM method="POST" action="#">
            <article class="stat-card">
                <label>NIK:</label><br>
                <input type="text" name="nik" width="10" placeholder="Masukkan NIK"><br>

                <label>Nama Lengkap:</label></br>
                <input type="text" name="nama_lengkap" placeholder="Masukkan Nama"><br>

                <label>Tempat Lahir:</label><br>
                <input type="text" name="tempat_lahir" placeholder="Contoh : Bandung" width="10"><br>

                <label>Tanggal Lahir:</label><br>
                <input type="text" name="tanggal_lahir" width="10" placeholder="2001-01-01"><br>

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
                </select><br>

                <label>Alamat Jalan:</label><br>
                <input type="text" name="alamat_jalan" placeholder="JL. Saranjana"><br>

                <label>RT:</label><br>
                <input type="text" name="rt" placeholder="Masukkan RT"><br>

                <label>RW:</label><br>
                <input type="text" name="rw" placeholder="Masukkan RW"><br>

                <label>Kecamatan:</label><br>
                <select name="id_kecamatan">
                    <option value="">- Pilih Kecamatan -</option>
                    <?php
                    $queri = "SELECT id_kecamatan, nama_kecamatan FROM kecamatan";
                    $ambil = mysqli_query($koneksi, $queri);
                    while ($data = mysqli_fetch_assoc($ambil)) {
                    ?>
                        <option value="<?php echo $data['id_kecamatan']; ?>">
                            <?php echo $data['nama_kecamatan']; ?>
                        </option>
                    <?php
                    }
                    ?>
                </select><br>
                
                <label>Kelurahan:</label><br>
                <input type="text" name="kelurahan" placeholder="Masukkan nama kelurahan"><br>

                <label>Agama:</label><br>
                <select name="id_agama">
                    <option value="">- Pilih Agama -</option>
                    <?php
                    $queri = "SELECT id_agama, nama_agama FROM agama";
                    $ambil = mysqli_query($koneksi, $queri);
                    while ($data = mysqli_fetch_assoc($ambil)) {
                    ?>
                        <option value="<?php echo $data['id_agama']; ?>">
                            <?php echo $data['nama_agama']; ?>
                        </option>
                    <?php
                    }
                    ?>
                </select><br>

                <label>Pekerjaan:</label><br>
                <input type="text" name="pekerjaan" placeholder="Masukkan pekerjaan"><br>

                <label>Status Perkawinana:</label><br>
                <select name="status_perkawinan">
                    <option value="BELUM KAWIN">BELUM KAWIN</option>
                    <option value="KAWIN">KAWIN</option>
                </select><br>

                <label>Kewarganegaraan:</label><br>
                <select name="kewarganegaraan">
                    <option value="WNI">WNI</option>
                    <option value="WNA">WNA</option>
                </select><br>

                <label>Masa Berlaku:</label><br>
                <input type="text" name="masa_berlaku" value="SEUMUR HIDUP" readonly><br>

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
            $NIK              = $_POST['nik'];
            $NAMA_LENGKAP     = $_POST['nama_lengkap'];
            $TEMPAT_LAHIR     = $_POST['tempat_lahir'];
            $TGL_LAHIR        = $_POST['tanggal_lahir'];
            $JENIS_KELAMIN    = $_POST['jenis_kelamin'];
            $GOL_DARAH        = $_POST['gol_darah'];
            $ALAMAT_JALAN     = $_POST['alamat_jalan'];
            $RT               = $_POST['rt'];
            $RW               = $_POST['rw'];
            $ID_KECAMATAN     = $_POST['id_kecamatan'];
            $KELURAHAN        = $_POST['kelurahan'];
            $ID_AGAMA         = $_POST['id_agama'];
            $PEKERJAAN        = $_POST['pekerjaan'];
            $STATUS_PERKAWINAN = $_POST['status_perkawinan'];
            $KEWARGANEGARAAN  = $_POST['kewarganegaraan'];
            $MASA_BERLAKU     = "SEUMUR HIDUP";

            $queri = "INSERT INTO penduduk (nik, nama_lengkap, tempat_lahir, tanggal_lahir, jenis_kelamin, gol_darah, alamat_jalan, rt, rw, id_kecamatan, kelurahan, id_agama, pekerjaan, status_perkawinan, kewarganegaraan, masa_berlaku)
                        VALUES ('$NIK', '$NAMA_LENGKAP', '$TEMPAT_LAHIR', '$TGL_LAHIR', '$JENIS_KELAMIN', '$GOL_DARAH', '$ALAMAT_JALAN', '$RT', '$RW', '$ID_KECAMATAN', '$KELURAHAN', '$ID_AGAMA', '$PEKERJAAN', '$STATUS_PERKAWINAN', '$KEWARGANEGARAAN', '$MASA_BERLAKU')";
            $asup = mysqli_query($koneksi, $queri);
            if ($asup) {
                echo "Data berhasil ditambahkan";
            } else {
                die("koneksi eror:" . mysqli_error($koneksi));
            }
        } else {
            echo "Silahkan untuk menginput untuk menambahkan data KTP anda";
        }
        ?>
    </main>
    <footer>KTP</footer>
</body>

</html>