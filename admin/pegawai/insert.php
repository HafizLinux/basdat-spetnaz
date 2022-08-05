<?php
    include '../../config.php';
    $db = dbConnect();

    $randPgw = "PGW-".random_int(3, 1000);
    $randNip = uniqid();
    if (isset($_POST['save'])) {
        $id_pegawai = $randPgw;
        $id_golongan = $_POST['id_golongan'];
        $id_jabatan = $_POST['id_jabatan'];
        $id_jadwal_kerja = $_POST['id_jadwal_kerja'];
        $nip = $randNip;
        $nama_pegawai = $_POST['nama_pegawai'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $tempat_lahir = $_POST['tempat_lahir'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $alamat = $_POST['alamat'];
        $no_telp = $_POST['no_telp'];
        $status = $_POST['status'];
        $agama = $_POST['agama'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sqlSelectEmail = "SELECT * FROM pegawai WHERE email = '$email'";
        $executeEmail = $db->query($sqlSelectEmail);

        if (mysqli_num_rows($executeEmail) > 0) {
            echo "
                <script>    
                    alert('Gagal Tambah Data Pegawai karena Email telah digunakan');
                </script>
            ";
        }else{
            $sqlInsertData = "INSERT INTO pegawai VALUES ('$id_pegawai', '$id_golongan', '$id_jabatan', '$id_jadwal_kerja','$nip', '$nama_pegawai', '$jenis_kelamin', '$tempat_lahir', '$tanggal_lahir', '$alamat', '$no_telp', '$status', '$agama', '$email', '$password');";
            $executeInsert = $db->query($sqlInsertData);

            if ($executeInsert) {
                echo "
                    <script>    
                        alert('Tambah Data Pegawai Berhasil');
                        document.location.href = '../index.php';
                    </script>
                ";
            }else{
                echo "
                    <script>    
                        alert('Tambah Data Pegawai Gagal');
                        document.location.href = '../index.php';
                    </script>
                ";
            }
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
                        Tambah Data Pegawai
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
                        <td><input type="text" name="nama_pegawai" placeholder="Nama Pegawai" class="form-control" required></td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td>
                            <select name="jenis_kelamin" class="form-control" required>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Kota Lahir</th>
                        <td><input type="text" name="tempat_lahir" placeholder="Kota Lahir" class="form-control" required></td>
                    </tr>
                    <tr>
                        <th>Tanggal Lahir</th>
                        <td><input type="date" name="tanggal_lahir" placeholder="Tanggal Lahir" class="form-control" required></td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td><input type="text" name="alamat" placeholder="Alamat" class="form-control" required></td>
                    </tr>
                    <tr>
                        <th>No Telepon</th>
                        <td><input type="number" name="no_telp" placeholder="No Telepon" class="form-control" required></td>
                    </tr>
                    <tr>
                        <th>Status Menikah</th>
                        <td>
                            <select name="status" class="form-control" required>
                                <option value="Sudah Menikah">Sudah Menikah</option>
                                <option value="Belum Menikah">Belum Menikah</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Agama</th>
                        <td><input type="text" name="agama" placeholder="Agama" class="form-control" required></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><input type="email" name="email" placeholder="Email" class="form-control" required></td>
                    </tr>
                    <tr>
                        <th>Password</th>
                        <td><input type="password" name="password" placeholder="Password" class="form-control" required></td>
                    </tr>

                    <tr>
                        <th>Golongan Pegawai</th>
                        <td>    
                            <select name="id_golongan" class="form-control">
                                <option value="" requiered>Pilih Golongan</option>
                            <?php $sqlGol = "SELECT * FROM golongan"; $execGol = $db->query($sqlGol);?> 
                            <?php foreach($execGol as $resGol):?>   
                                <option value="<?= $resGol['id_golongan']?>"><?= $resGol['nama_golongan']?></option>
                            <?php endforeach;?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <th>Jabatan Pegawai</th>
                        <td>    
                            <select name="id_jabatan" class="form-control">
                                <option value="" required>Pilih Jabatan</option>
                            <?php $sqlJb = "SELECT * FROM jabatan"; $execJb = $db->query($sqlJb);?> 
                            <?php foreach($execJb as $resJb):?>   
                                <option value="<?= $resJb['id_jabatan']?>"><?= $resJb['nama_jabatan']?></option>
                            <?php endforeach;?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <th>Jadwal Kerja Pegawai</th>
                        <td>    
                            <select name="id_jadwal_kerja" class="form-control">
                                <option value="" required>Pilih jadwal</option>
                            <?php $sqlJd = "SELECT * FROM jadwalKerja"; $execJd = $db->query($sqlJd);?> 
                            <?php foreach($execJd as $resJd):?>   
                                <option value="<?= $resJd['id_jadwal_kerja']?>"><?= $resJd['hari_kerja']?> (<?= $resJd['jam_kerja']?>)</option>
                            <?php endforeach;?>
                            </select>
                        </td>
                    </tr>


                </table>

                <hr>


                <button class="btn btn-primary" name="save" type="submit">Save</button>

            </form>
        </div>
    </div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>