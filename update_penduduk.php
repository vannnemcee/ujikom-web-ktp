<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Penduduk - UI CSS</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <header class="site-header">
        <div class="topbar">
            <div class="brand">
                <h1>Website Data Kependudukan</h1>
                <p>Versi UI dengan CSS, terhubung database</p>
            </div>
            <nav class="navbar">
                <a href="index.html">Dashboard</a>
                <a href="input_penduduk.php">Input Penduduk</a>
                <a class="active" href="hasil_penduduk.php">Data Penduduk</a>
            </nav>
        </div>
    </header>

    <main class="container">
        <h1>Ubah Data Penduduk</h1>

        <?php
        include "config/koneksi.php";

        $nik = $_GET['nik'];

        if (isset($_POST['simpan'])) {
            $nama_lengkap      = $_POST['nama_lengkap'];
            $tempat_lahir      = $_POST['tempat_lahir'];
            $tanggal_lahir     = $_POST['tanggal_lahir'];
            $jenis_kelamin     = $_POST['jenis_kelamin'];
            $gol_darah         = $_POST['gol_darah'];
            $alamat_jalan      = $_POST['alamat_jalan'];
            $rt                = $_POST['rt'];
            $rw                = $_POST['rw'];
            $id_agama          = $_POST['id_agama'];
            $status_perkawinan = $_POST['status_perkawinan'];
            $kewarganegaraan   = $_POST['kewarganegaraan'];
            $masa_berlaku      = $_POST['masa_berlaku'];

            $query_update = "UPDATE penduduk SET 
                                nama_lengkap      = '$nama_lengkap', 
                                tempat_lahir      = '$tempat_lahir', 
                                tanggal_lahir     = '$tanggal_lahir', 
                                jenis_kelamin     = '$jenis_kelamin', 
                                gol_darah         = '$gol_darah', 
                                alamat_jalan      = '$alamat_jalan', 
                                rt                = '$rt', 
                                rw                = '$rw', 
                                id_agama          = '$id_agama', 
                                status_perkawinan = '$status_perkawinan', 
                                kewarganegaraan   = '$kewarganegaraan', 
                                masa_berlaku      = '$masa_berlaku' 
                            WHERE nik = '$nik'";

            $hasil_update = mysqli_query($koneksi, $query_update);

            if ($hasil_update) {
                echo '<script>alert("Ubah data berhasil!"); window.location.href="hasil_penduduk.php";</script>';
            } else {
                echo '<script>alert("Ubah data gagal!");</script>';
            }
        }
        $tampil = "SELECT penduduk.*,  kelurahan.nama_kelurahan,  kecamatan.nama_kecamatan, pekerjaan.nama_pekerjaan
                   FROM penduduk 
                   LEFT JOIN kelurahan ON penduduk.id_kelurahan = kelurahan.id_kelurahan LEFT JOIN kecamatan ON kelurahan.id_kecamatan = kecamatan.id_kecamatan LEFT JOIN pekerjaan ON penduduk.id_pekerjaan = pekerjaan.id_pekerjaan
                   WHERE penduduk.nik = '$nik'";
        
        $query = mysqli_query($koneksi, $tampil);
        $penduduk = mysqli_fetch_array($query);
        ?>

        <form method="post" action="">
            <table>
                <tr>
                    <td>NIK</td>
                    <td><input type="text" name="nik_tampil" value="<?php echo $penduduk['nik']; ?>" readonly style="background-color: #e9ecef;"></td>
                </tr>
                <tr>
                    <td>Nama Lengkap</td>
                    <td><input type="text" name="nama_lengkap" value="<?php echo $penduduk['nama_lengkap']; ?>" required></td>
                </tr>
                <tr>
                    <td>Tempat Lahir</td>
                    <td><input type="text" name="tempat_lahir" value="<?php echo $penduduk['tempat_lahir']; ?>"></td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td><input type="date" name="tanggal_lahir" value="<?php echo $penduduk['tanggal_lahir']; ?>"></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>
                        <select name="jenis_kelamin">
                            <option value="LAKI-LAKI" <?php echo ($penduduk['jenis_kelamin'] == 'LAKI-LAKI') ? 'selected' : ''; ?>>LAKI-LAKI</option>
                            <option value="PEREMPUAN" <?php echo ($penduduk['jenis_kelamin'] == 'PEREMPUAN') ? 'selected' : ''; ?>>PEREMPUAN</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Golongan Darah</td>
                    <td>
                        <select name="gol_darah">
                            <option value="A" <?php echo ($penduduk['gol_darah'] == 'A') ? 'selected' : ''; ?>>A</option>
                            <option value="B" <?php echo ($penduduk['gol_darah'] == 'B') ? 'selected' : ''; ?>>B</option>
                            <option value="AB" <?php echo ($penduduk['gol_darah'] == 'AB') ? 'selected' : ''; ?>>AB</option>
                            <option value="O" <?php echo ($penduduk['gol_darah'] == 'O') ? 'selected' : ''; ?>>O</option>
                            <option value="-" <?php echo ($penduduk['gol_darah'] == '-') ? 'selected' : ''; ?>>-</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Alamat Jalan</td>
                    <td><input type="text" name="alamat_jalan" value="<?php echo $penduduk['alamat_jalan']; ?>"></td>
                </tr>
                <tr>
                    <td>RT</td>
                    <td><input type="text" name="rt" value="<?php echo $penduduk['rt']; ?>"></td>
                </tr>
                <tr>
                    <td>RW</td>
                    <td><input type="text" name="rw" value="<?php echo $penduduk['rw']; ?>"></td>
                </tr>
                <tr>
                    <td>Kelurahan / Desa</td>
                    <td><input type="text" name="kelurahan" value="<?php echo isset($penduduk['nama_kelurahan']) ? $penduduk['nama_kelurahan'] : ''; ?>" required></td>
                </tr>
                <tr>
                    <td>Kecamatan</td>
                    <td><input type="text" name="kecamatan" value="<?php echo isset($penduduk['nama_kecamatan']) ? $penduduk['nama_kecamatan'] : ''; ?>" required></td>
                </tr>
                <tr>
                    <td>Agama</td>
                    <td>
                        <select name="id_agama" required>
                            <option value="">-- Pilih Agama --</option>
                            <?php
                            $q_agm = mysqli_query($koneksi, "SELECT * FROM agama");
                            while ($agm = mysqli_fetch_assoc($q_agm)) {
                                $selected = ($agm['id_agama'] == $penduduk['id_agama']) ? "selected" : "";
                                echo "<option value='".$agm['id_agama']."' $selected>".$agm['nama_agama']."</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Pekerjaan</td>
                    <td><input type="text" name="pekerjaan" value="<?php echo isset($penduduk['nama_pekerjaan']) ? $penduduk['nama_pekerjaan'] : ''; ?>" required></td>
                </tr>
                <tr>
                    <td>Status Perkawinan</td>
                    <td>
                        <select name="status_perkawinan">
                            <option value="BELUM KAWIN" <?php echo ($penduduk['status_perkawinan'] == 'BELUM KAWIN') ? 'selected' : ''; ?>>BELUM KAWIN</option>
                            <option value="KAWIN" <?php echo ($penduduk['status_perkawinan'] == 'KAWIN') ? 'selected' : ''; ?>>KAWIN</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Kewarganegaraan</td>
                    <td><input type="text" name="kewarganegaraan" value="WNI" readonly style="background-color: #e9ecef;"></td>
                </tr>
                <tr>
                    <td>Masa Berlaku</td>
                    <td><input type="text" name="masa_berlaku" value="SEUMUR HIDUP" readonly style="background-color: #e9ecef;"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="simpan" value="Simpan"></td>
                    <td><input type="reset" value="Reset"></td>
                </tr>
                <tr>
                    <td colspan="2"><a class="navbar" href="hasil_penduduk.php">Kembali</a></td>
                </tr>
            </table>
        </form>
    </main>
</body>
</html>