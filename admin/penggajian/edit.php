<?php
    
    include '../../config.php';
    $db = dbConnect();

    $id = $_GET['id'];

    if ($id) {
        $select = "SELECT * FROM penggajian WHERE id_penggajian = '$id'";
        $sql = $db->query($select);
        
        if (!mysqli_num_rows($sql) > 0) {
            echo "
                <script>
                    alert('data tidak ditemukan');
                    document.location.href = 'view.php';
                </script>
            ";
        }
    }else{
        echo "
            <script>
                alert('data tidak ditemukan');
                document.location.href = 'view.php';
            </script>
        ";
    }

    $sqlViewPgj = "SELECT * FROM penggajian WHERE id_penggajian = '$id'";
    $execPgj = $db->query($sqlViewPgj);
    $assocPgj = $execPgj->fetch_assoc();

    if (isset($_POST['save'])) {
        $id_penggajian = $randPgw;
        $id_jabatan = $_POST['id_jabatan'];
        $id_golongan = $_POST['id_golongan'];
        $id_jadwalKerja = $_POST['id_jadwalKerja'];
        $bayaran_lembur = $_POST['bayaran_lembur'];
        $tanggal_penggajian = $_POST['tanggal_penggajian'];
        $gaji_pokok = $_POST['gaji_pokok'];
        $tunjangan_golongan = $_POST['tunjangan_golongan'];
        $total_gaji = $_POST['total_gaji'];
        $id_pegawai = $_POST['id_pegawai'];

        $sqlInsertData = "UPDATE penggajian SET 
                            id_jabatan = '$id_jabatan', 
                            id_golongan ='$id_golongan', 
                            id_jadwalKerja = '$id_jadwalKerja',
                            bayaran_lembur = '$bayaran_lembur', 
                            tanggal_penggajian = '$tanggal_penggajian', 
                            gaji_pokok = '$gaji_pokok', 
                            tunjangan_golongan = '$tunjangan_golongan', 
                            total_gaji = '$total_gaji', 
                            id_pegawai = '$id_pegawai', 
                        WHERE id_penggajian = '$id';
                        ";    
        $executeInsert = $db->query($sqlInsertData);
        

        if ($executeInsert) {
            echo "
                <script>    
                    alert('Edit Data Penggajian Berhasil');
                    document.location.href = '../index.php';
                </script>
            ";
        }else{
            echo "
                <script>    
                    alert('Edit Data Penggajian Gagal');
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
                        Update Data Penggajian
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
                        <td><input type="text" name="nama_pegawai" placeholder="Nama Pegawai" class="form-control" required value="<?= $assocPgw['nama_pegawai']?>"></td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td>
                            <select name="jenis_kelamin" class="form-control" required>
                                <option value="<?= $assocPgw['jenis_kelamin']?>"><?= $assocPgw['jenis_kelamin']?></option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Kota Lahir</th>
                        <td><input type="text" name="tempat_lahir" placeholder="Kota Lahir" class="form-control" required value="<?= $assocPgw['tempat_lahir']?>"></td>
                    </tr>
                    <tr>
                        <th>Tanggal Lahir</th>
                        <td><input type="date" name="tanggal_lahir" placeholder="Tanggal Lahir" class="form-control" required value="<?= $assocPgw['tanggal_lahir']?>"></td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td><input type="text" name="alamat" placeholder="Alamat" class="form-control" required value="<?= $assocPgw['alamat']?>"></td>
                    </tr>
                    <tr>
                        <th>No Telepon</th>
                        <td><input type="number" name="no_telp" placeholder="No Telepon" class="form-control" required value="<?= $assocPgw['no_telp']?>"></td>
                    </tr>
                    <tr>
                        <th>Status Menikah</th>
                        <td>
                            <select name="status" class="form-control" required>
                                <option value="<?= $assocPgw['status']?>"><?= $assocPgw['status']?></option>
                                <option value="Sudah Menikah">Sudah Menikah</option>
                                <option value="Belum Menikah">Belum Menikah</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Agama</th>
                        <td><input type="text" name="agama" placeholder="Agama" class="form-control" required value="<?= $assocPgw['agama']?>"></td>
                    </tr>
                    <tr>
                        <th>Password</th>
                        <td><input type="password" name="password" placeholder="Password" class="form-control" required value="<?= $assocPgw['password']?>"></td>
                    </tr>

                    <tr>
                        <th>Golongan Pegawai</th>
                        <td>    
                            <select name="id_golongan" class="form-control">
                                <option value="<?= $assocPgw['id_golongan']?>" requiered><?= $assocPgw['nama_golongan']?></option>
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
                                <option value="<?= $assocPgw['id_jabatan']?>" required><?= $assocPgw['nama_jabatan']?></option>
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
                                <option value="<?= $assocPgw['id_jadwal_kerja']?>" required><?= $assocPgw['hari_kerja']?> (<?= $assocPgw['jam_kerja']?>)</option>
                            <?php $sqlJd = "SELECT * FROM jadwalKerja"; $execJd = $db->query($sqlJd);?> 
                            <?php foreach($execJd as $resJd):?>   
                                <option value="<?= $resJd['id_jadwal_kerja']?>"><?= $resJd['hari_kerja']?> (<?= $resJd['jam_kerja']?>)</option>
                            <?php endforeach;?>
                            </select>
                        </td>
                    </tr>


                </table>

                <hr>


                <button class="btn btn-primary" name="save" type="submit">Update</button>

            </form>
        </div>
    </div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>