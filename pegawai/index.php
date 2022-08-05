<?php
    session_start();
    if(!isset($_SESSION['pegawai'])){
        echo "
            <script>
                alert('Login Dulu Brodiii!!');
                document.location.href = '../login.php';
            </script>
        ";
    }

    include '../config.php';

    $db = dbConnect();
    $getUsername = $_SESSION['username'];
    $sql = "SELECT p.*, a.*, b.*, c.* FROM (((pegawai as p 
                INNER JOIN golongan as a ON p.id_golongan = a.id_golongan)
                INNER JOIN jabatan as b ON p.id_jabatan = b.id_jabatan)
                INNER JOIN jadwalKerja as c ON p.id_jadwal_kerja = c.id_jadwal_kerja)
            WHERE email = '$getUsername'";
            
    $execPegawai = $db->query($sql);
    $assocPgw = $execPegawai->fetch_assoc();
    $totalgaji = $assocPgw['tunjangan_istri'] + $assocPgw['tunjangan_anak'] + $assocPgw['gaji_pokok']; 

    $idpgwfromsql =  $assocPgw['id_pegawai'];
    $sqlpenggajian = "SELECT * FROM penggajian WHERE id_pegawai = '$idpgwfromsql'";
    $execPenggajian = $db->query($sqlpenggajian);
    
    $id_pgw = $assocPgw['id_pegawai'];
    $logjb = "SELECT * FROM logJabatan WHERE id_pegawai = '$id_pgw'";
    $logJbExecute = $db->query($logjb);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="icon" href="../assets/logohonda.png">
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
            <a class="nav-link active" aria-current="page" href="logout.php">Logout</a>
            </li>
        </ul>
        </div>
    </div>
</nav>


<div class="container">
    

    <div class="mt-5">
        <h3>
            <b>Dashboard Pegawai</b>
        </h3>    
    </div>



    <div class="row container mt-5 mb-5 ">

        <div class="col-sm-7 mb-3">
            <div class="card">
                <div class="card-body">

                    <div class="mt-3">
                        <b>
                            Detail Pegawai
                        </b>
                    </div>

                    <div class="mt-5 mb-3">
                        <table class="table">
                            <tr>
                                <th>Email</th>
                                <td><?= $getUsername?></td>
                            </tr>
                            
                            <tr>
                                <th>Nama Golongan</th>
                                <td><?= $assocPgw['nama_golongan']?></td>
                            </tr>
                            
                            <tr>
                                <th>Total Tunjangan</th>
                                <td>Rp. <?= number_format($assocPgw['tunjangan_istri'] + $assocPgw['tunjangan_anak'], 2,',','.')?></td>
                            </tr>

                            <tr>
                                <th>Gaji Pokok</th>
                                <td>Rp. <?= number_format($assocPgw['gaji_pokok'], 2,',','.')?></td>
                            </tr>
                            
                            <tr>
                                <th>Total Gaji/Bulan</th>
                                <td>Rp. <?= number_format($totalgaji, 2,',','.')?></td>
                            </tr>

                            <tr>
                                <th>Nama Jabatan</th>
                                <td><?= $assocPgw['nama_jabatan']?></td>
                            </tr>
                            
                            <tr>
                                <th>Jadwal Kerja</th>
                                <td><?= $assocPgw['hari_kerja']?> <?= $assocPgw['jam_kerja']?></td>
                            </tr>

                            <tr>
                                <th>NIP</th>
                                <td><?= $assocPgw['nip']?></td>
                            </tr>

                            <tr>
                                <th>Nama Pegawai</th>
                                <td><?= $assocPgw['nama_pegawai']?></td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td><?= $assocPgw['jenis_kelamin']?></td>
                            </tr>
                            <tr>
                                <th>Tempat Lahir</th>
                                <td><?= $assocPgw['tempat_lahir']?></td>
                            </tr>
                            <tr>
                                <th>Tanggal lahir</th>
                                <td><?= $assocPgw['tanggal_lahir']?></td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td><?= $assocPgw['alamat']?></td>
                            </tr>
                            <tr>
                                <th>No Telp</th>
                                <td><?= $assocPgw['no_telp']?></td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td><?= $assocPgw['status']?></td>
                            </tr>
                            <tr>
                                <th>Agama</th>
                                <td><?= $assocPgw['agama']?></td>
                            </tr>
                        </table>
                    </div>
                </div>    
            </div>
        </div>


        <div class="col-sm-5 mb-3">
            <div class="card">
                <div class="card-body">
                    <b>
                        Log Jabatan Karyawan
                    </b>
                    <?php $i=1; foreach($logJbExecute as $resExecute):?>
                    <p><?= $i++;?>. <?= $resExecute['old_jabatan']?> TO >>> <?= $resExecute['new_jabatan']?> <?= $resExecute['last_update']?></p>
                    <?php endforeach;?>
                </div>
            </div>


        <div class="card mt-5">
                <div class="card-body">
                    <b>
                        Log Gaji Karyawan
                    </b>
                    <?php $i=1; foreach($execPenggajian as $resPeng):?>
                    <p><?= $i++;?>. <?= $resPeng['date']?> >>> <?= $resPeng['total_gaji']?></p>
                    <?php endforeach;?>
                </div>
            </div>
        </div>



    </div>

</div>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>