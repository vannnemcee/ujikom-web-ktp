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
                </select>

                <label>Alamat Jalan:</label><br>
                <input type="text" name="alamat_jalan" placeholder="JL. Saranjana">

                <label>RT:</label><br>
                <input type="text" name="rt" placeholder="Masukkan RT">

                <label>RW:</label><br>
                <input type="text" name="rw" placeholder="Masukkan RW">

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
            $NIK            = $_POST['nik'];
            $NAMA_LENGKAP   = $_POST['nama_lengkap'];
            $TEMPAT_LAHIR   = $_POST['tempat_lahir'];
            $TGL_LAHIR      = $_POST['tanggal_lahir'];
            $JENIS_KELAMIN  = $_POST['jenis_kelamin'];
            $GOL_DARAH      = $_POST['gol_darah'];
            $ALAMAT_JALAN   = $_POST['alamat_jalan'];
            $RT             = $_POST['rt'];
            $RW             = $_POST['rw'];
            $STATUS_PERKAWINAN = $_POST['status_perkawinan'];
            $KEWARGANEGARAAN = $_POST['kewarganegaraan'];

            $queri = "INSERT INTO penduduk (nik, nama_lengkap, tempat_lahir, tanggal_lahir, jenis_kelamin, gol_darah, alamat_jalan, rt, rw, status_perkawinan, kewarganegaraan)
              VALUES ('$NIK', '$NAMA_LENGKAP', '$TEMPAT_LAHIR', '$TGL_LAHIR', '$JENIS_KELAMIN', '$GOL_DARAH', '$ALAMAT_JALAN', '$RT', '$RW', '$STATUS_PERKAWINAN', '$KEWARGANEGARAAN')";
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