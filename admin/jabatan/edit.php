<?php
    include '../../config.php';
    $db = dbConnect();

    $id = $_GET['id'];

    if ($id) {
        $select = "SELECT * FROM jabatan WHERE id_jabatan = '$id'";
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

    $sqlViewPgw = "SELECT * FROM jabatan WHERE id_jabatan = '$id'";
    $execPgw = $db->query($sqlViewPgw);
    $assoc = $execPgw->fetch_assoc();


    if (isset($_POST['save'])) {
        $nama_jabatan = $_POST['nama_jabatan'];
        $gaji_pokok = $_POST['gaji_pokok'];

        $sqlInsert = "UPDATE jabatan SET 
                            nama_jabatan = '$nama_jabatan', 
                            gaji_pokok = '$gaji_pokok'
                        WHERE id_jabatan = '$id'";
        $execute = $db->query($sqlInsert);

        if ($execute) {
            echo "
                <script>
                    alert('Sukses Mengedit Data');
                    document.location.href = '../index.php';
                </script>
            ";
        }else{
            echo "
                <script>
                    alert('Gagal Mengedit Data');
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
                        Update Data Jabatan
                    </b>
                </h4>
            </div>

            <div class="">
                <a href="../index.php" class="btn btn-danger">Back</a>
            </div>

            <form action="" method="post" class="mt-5 mb-5">
                <table class="table"> 
                    <tr>
                        <th>Nama Jabatan</th>
                        <td><input type="text" name="nama_jabatan" class="form-control" required value="<?= $assoc['nama_jabatan']?>"></td>
                    </tr>

                    <tr>
                        <th>Gaji Pokok</th>
                        <td><input type="text" name="gaji_pokok" class="form-control" required value="<?= $assoc['gaji_pokok']?>"></td>
                    </tr>

                </table>
                <button class="btn btn-primary" name="save" type="submit">Save</button>

            </form>
        </div>
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>