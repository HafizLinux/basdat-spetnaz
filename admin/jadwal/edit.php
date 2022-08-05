<?php
    include '../../config.php';
    $db = dbConnect();

    $id = $_GET['id'];

    if ($id) {
        $select = "SELECT * FROM jadwalKerja WHERE id_jadwal_kerja = '$id'";
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

    $sqlViewPgw = "SELECT * FROM jadwalKerja WHERE id_jadwal_kerja = '$id'";
    $execPgw = $db->query($sqlViewPgw);
    $assoc = $execPgw->fetch_assoc();


    if (isset($_POST['save'])) {
        $hari_kerja = $_POST['hari_kerja'];
        $jam_kerja = $_POST['jam_kerja'];

        $sqlInsert = "UPDATE jadwalKerja SET 
                            hari_kerja = '$hari_kerja', 
                            jam_kerja = '$jam_kerja'
                        WHERE id_jadwal_kerja = '$id'";
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
                        Update Data Jadwal Kerja
                    </b>
                </h4>
            </div>

            <div class="">
                <a href="../index.php" class="btn btn-danger">Back</a>
            </div>

            <form action="" method="post" class="mt-5 mb-5">
                <table class="table"> 
                    <tr>
                        <th>Hari Kerja</th>
                        <td><input type="text" name="hari_kerja" class="form-control" required value="<?= $assoc['hari_kerja']?>"></td>
                    </tr>

                    <tr>
                        <th>Jam Kerja</th>
                        <td><input type="text" name="jam_kerja" class="form-control" required value="<?= $assoc['jam_kerja']?>"></td>
                    </tr>

                </table>
                <button class="btn btn-primary" name="save" type="submit">Save</button>

            </form>
        </div>
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>