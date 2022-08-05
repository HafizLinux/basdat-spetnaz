<?php
    include '../../config.php';
    $db = dbConnect();


    $sqlViewPgw = "SELECT a.*, b.*, c.*, d.* FROM (((pegawai as a
    INNER JOIN golongan as b ON a.id_golongan = b.id_golongan)
    INNER JOIN jabatan as c ON a.id_jabatan = c.id_jabatan)
    INNER JOIN jadwalKerja as d ON a.id_jadwal_kerja = d.id_jadwal_kerja)";
    $execPgw = $db->query($sqlViewPgw);
    $assocPgw = $execPgw->fetch_assoc();

    $randPgw = "PGJ-".random_int(3, 1000);;
    if (isset($_POST['save'])) {
        $id_penggajian = $randPgw;
        $id_pegawai = $_POST['id_pegawai'];
        $ss = explode('+', $id_pegawai);
        $idpgw = $ss[0];
        $total_gaji = $ss[1];

        $sqlInsertData = "INSERT INTO penggajian VALUES ('$id_penggajian', '$idpgw', '$total_gaji', NOW())";
        $executeInsert = $db->query($sqlInsertData);

        if ($executeInsert) {
            echo "
                <script>    
                    alert('Tambah Data Penggajian Berhasil');
                    document.location.href = '../index.php';
                </script>
            ";
        }else{
            echo "
                <script>    
                    alert('Tambah Data Penggajian Gagal');
                    document.location.href = '../index.php';
                </script>
            ";
        }
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="icon" href="../../assets/logohonda.png">
    <title>Admin Page</title>
</head>
<body>
    
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
    <img src="https://ik.imagekit.io/zlt25mb52fx/ahmcdn/assets/images/logo/honda.svg" width="20%" class="navbar-brand">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../logout.php">Logout</a>
            </li>
        </ul>
        </div>
    </div>
</nav>


    <div class="container">
        <div class="mt-5">

            <div class="mt-5 mb-5">
                <h4>
                    <b>
                        Tambah Data Penggajian
                    </b>
                </h4>
            </div>

            <div class="">
                <a href="../index.php" class="btn btn-danger">Back</a>
            </div>

            <form action="" method="post" class="mt-5 mb-5">
                <table class="table"> 
                    <tr>
                        <th>Nama Pegawai</th>
                        <td>
                            <select name="id_pegawai" class="form-control">
                                <option value="" required>Pilih Pegawai</option>
                                <?php foreach($execPgw as $resPeg):?>
                                    <option value="<?= $resPeg['id_pegawai']?>+Rp. <?= number_format($resPeg['tunjangan_anak'] + $resPeg['tunjangan_istri'] + $resPeg['gaji_pokok'], 2, ',','.');?>"><?= $resPeg['nama_pegawai']?> - Rp. <?= number_format($resPeg['tunjangan_anak'] + $resPeg['tunjangan_istri'] + $resPeg['gaji_pokok'], 2, ',','.');?></option>
                                <?php endforeach;?>
                            </select>
                        </td>
                    </tr>
                </table>
                <button class="btn btn-primary" name="save" type="submit">Save</button>

            </form>
        </div>
    </div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>