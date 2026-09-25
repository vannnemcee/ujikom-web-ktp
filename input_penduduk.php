<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Penduduk</title>
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>
    <?php include "config/koneksi.php"; ?>

    <header class="site-header">
        <div class="topbar">
            <div class="brand">
                <h1>Website Data Kependudukan</h1>
                <p>Versi UI dengan CSS, terhubung database</p>
            </div>
            <nav class="navbar">
                <a href="index.php">Dashboard</a>
                <a class="active" href="input_penduduk.php">Input Penduduk</a>
                <a href="hasil_penduduk.php">Data Penduduk</a>
            </nav>
        </div>
    </header>

    <main class="container">
        <h2>Input Penduduk</h2>
        <form method="POST" action="">
            <article class="stat-card">
                <label>NIK:</label><br>
                <input type="text" name="nik" placeholder="Masukkan NIK" required><br><br>

                <label>Nama Lengkap:</label><br>
                <input type="text" name="nama_lengkap" placeholder="Masukkan Nama" required><br><br>

                <label>Tempat Lahir:</label><br>
                <input type="text" name="tempat_lahir" placeholder="Contoh : Bandung"><br><br>

                <label>Tanggal Lahir:</label><br>
                <input type="date" name="tanggal_lahir"><br><br>

                <label>Jenis Kelamin:</label>
                <div class="radio-group-container">
                    <label class="radio-item">
                        <input type="radio" name="jenis_kelamin" value="LAKI-LAKI" checked>
                        <span>LAKI-LAKI</span>
                    </label>
                    <label class="radio-item">
                        <input type="radio" name="jenis_kelamin" value="PEREMPUAN">
                        <span>PEREMPUAN</span>
                    </label>
                </div><br>

                <label>Golongan Darah:</label><br>
                <select name="gol_darah">
                    <option value="">- Pilih Golongan Darah -</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="AB">AB</option>
                    <option value="O">O</option>
                </select><br><br>

                <label>Alamat Jalan:</label><br>
                <input type="text" name="alamat_jalan" placeholder="JL. Saranjana"><br><br>

                <label>RT:</label><br>
                <input type="text" name="rt" placeholder="Masukkan RT"><br><br>

                <label>RW:</label><br>
                <input type="text" name="rw" placeholder="Masukkan RW"><br><br>

                <label>Kecamatan:</label><br>
                <input type="text" name="kecamatan" placeholder="Masukkan nama kecamatan" required><br><br>

                <label>Kelurahan:</label><br>
                <input type="text" name="kelurahan" placeholder="Masukkan nama kelurahan" required><br><br>

                <label>Agama:</label><br>
                <select name="id_agama" required>
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
                </select><br><br>

                <label>Pekerjaan:</label><br>
                <input type="text" name="pekerjaan" placeholder="Masukkan pekerjaan" required><br><br>

                <label>Status Perkawinan:</label><br>
                <select name="status_perkawinan">
                    <option value="BELUM KAWIN">BELUM KAWIN</option>
                    <option value="KAWIN">KAWIN</option>
                </select><br><br>

                <label>Kewarganegaraan:</label><br>
                <select name="kewarganegaraan">
                    <option value="WNI">WNI</option>
                    <option value="WNA">WNA</option>
                </select><br><br>

                <label>Masa Berlaku:</label><br>
                <input type="text" name="masa_berlaku" value="SEUMUR HIDUP" readonly><br><br>

                <input type="submit" name="simpan" value="Simpan" class="button">
                <input type="reset" value="Kosongkan" class="button button-secondary">
            </article>
        </form>
    </main>

    <hr>

    <main class="container">
        <h2>Status Input Data</h2>
        <?php
        if (isset($_POST['simpan'])) {

            $NIK               = mysqli_real_escape_string($koneksi, $_POST['nik']);
            $NAMA_LENGKAP      = mysqli_real_escape_string($koneksi, $_POST['nama_lengkap']);
            $TEMPAT_LAHIR      = mysqli_real_escape_string($koneksi, $_POST['tempat_lahir']);
            $TGL_LAHIR         = mysqli_real_escape_string($koneksi, $_POST['tanggal_lahir']);
            $JENIS_KELAMIN     = mysqli_real_escape_string($koneksi, $_POST['jenis_kelamin']);
            $GOL_DARAH         = mysqli_real_escape_string($koneksi, $_POST['gol_darah']);
            $ALAMAT_JALAN      = mysqli_real_escape_string($koneksi, $_POST['alamat_jalan']);
            $RT                = mysqli_real_escape_string($koneksi, $_POST['rt']);
            $RW                = mysqli_real_escape_string($koneksi, $_POST['rw']);
            $ID_AGAMA          = mysqli_real_escape_string($koneksi, $_POST['id_agama']);
            $STATUS_PERKAWINAN = mysqli_real_escape_string($koneksi, $_POST['status_perkawinan']);
            $KEWARGANEGARAAN   = mysqli_real_escape_string($koneksi, $_POST['kewarganegaraan']);
            $MASA_BERLAKU      = "SEUMUR HIDUP";

            $KECAMATAN_INPUT   = trim(mysqli_real_escape_string($koneksi, $_POST['kecamatan']));
            $KELURAHAN_INPUT   = trim(mysqli_real_escape_string($koneksi, $_POST['kelurahan']));
            $PEKERJAAN_INPUT   = trim(mysqli_real_escape_string($koneksi, $_POST['pekerjaan']));

            $q_kec = mysqli_query($koneksi, "SELECT id_kecamatan FROM kecamatan WHERE LOWER(nama_kecamatan) = LOWER('$KECAMATAN_INPUT')");
            if (mysqli_num_rows($q_kec) > 0) {
                $d_kec = mysqli_fetch_assoc($q_kec);
                $id_kecamatan = $d_kec['id_kecamatan'];
            } else {
                mysqli_query($koneksi, "INSERT INTO kecamatan (nama_kecamatan) VALUES ('$KECAMATAN_INPUT')");
                $id_kecamatan = mysqli_insert_id($koneksi);
            }

    
            $q_kel = mysqli_query($koneksi, "SELECT id_kelurahan FROM kelurahan WHERE LOWER(nama_kelurahan) = LOWER('$KELURAHAN_INPUT') AND id_kecamatan = '$id_kecamatan'");
            if (mysqli_num_rows($q_kel) > 0) {
                $d_kel = mysqli_fetch_assoc($q_kel);
                $id_kelurahan = $d_kel['id_kelurahan'];
            } else {
                mysqli_query($koneksi, "INSERT INTO kelurahan (nama_kelurahan, id_kecamatan) VALUES ('$KELURAHAN_INPUT', '$id_kecamatan')");
                $id_kelurahan = mysqli_insert_id($koneksi);
            }


            $q_pek = mysqli_query($koneksi, "SELECT id_pekerjaan FROM pekerjaan WHERE LOWER(nama_pekerjaan) = LOWER('$PEKERJAAN_INPUT')");
            if (mysqli_num_rows($q_pek) > 0) {
                $d_pek = mysqli_fetch_assoc($q_pek);
                $id_pekerjaan = $d_pek['id_pekerjaan'];
            } else {
                mysqli_query($koneksi, "INSERT INTO pekerjaan (nama_pekerjaan) VALUES ('$PEKERJAAN_INPUT')");
                $id_pekerjaan = mysqli_insert_id($koneksi);
            }

    
            $queri = "INSERT INTO penduduk (nik, nama_lengkap, tempat_lahir, tanggal_lahir, jenis_kelamin, gol_darah, alamat_jalan, rt, rw, id_kelurahan, id_agama, id_pekerjaan, status_perkawinan, kewarganegaraan, masa_berlaku)
                      VALUES ('$NIK', '$NAMA_LENGKAP', '$TEMPAT_LAHIR', '$TGL_LAHIR', '$JENIS_KELAMIN', '$GOL_DARAH', '$ALAMAT_JALAN', '$RT', '$RW', '$id_kelurahan', '$ID_AGAMA', '$id_pekerjaan', '$STATUS_PERKAWINAN', '$KEWARGANEGARAAN', '$MASA_BERLAKU')";

            $asup = mysqli_query($koneksi, $queri);

            if ($asup) {
                echo "<p style='color:green; font-weight:bold;'>Data penduduk berhasil ditambahkan!</p>";
            } else {
                echo "<p style='color:red;'>Koneksi error: " . mysqli_error($koneksi) . "</p>";
            }
        } else {
            echo "<p>Silahkan menginput untuk menambahkan data KTP anda.</p>";
        }
        ?>
    </main>
    <footer>KTP</footer>
</body>

</html>