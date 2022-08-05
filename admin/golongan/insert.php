<?php
    include '../../config.php';
    $db = dbConnect();

    if (isset($_POST['save'])) {
        $id_golongan = "GL-".random_int(3, 1000);
        $nama_golongan = $_POST['nama_golongan'];
        $tunjangan_anak = $_POST['tunjangan_anak'];
        $tunjangan_istri = $_POST['tunjangan_istri'];

        $sqlInsert = "INSERT INTO golongan VALUES ('$id_golongan', '$nama_golongan', '$tunjangan_anak', '$tunjangan_istri')";
        $execute = $db->query($sqlInsert);

        if ($execute) {
            echo "
                <script>
                    alert('Sukses Menambahkan Data');
                    document.location.href = '../index.php';
                </script>
            ";
        }else{
            echo "
                <script>
                    alert('Gagal Menambahkan Data');
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

    <div class="container mt-5">
        <a href="../index.php" class="mb-5 btn btn-danger">Back</a>
        <form action="" method="post">
            <table class="table">
                <tr>
                    <th>Nama Golongan</th>
                    <td><input type="text" name="nama_golongan" class="form-control" required></td>
                </tr>
                <tr>
                    <th>Tunjangan Anak</th>
                    <td><input type="text" name="tunjangan_anak" class="form-control" required></td>
                </tr>
                <tr>
                    <th>Tunjangan Istri</th>
                    <td><input type="text" name="tunjangan_istri" class="form-control" required></td>
                </tr>
                <tr>
                    <td></td>
                    <td><button class="btn btn-primary" name="save" type="submit">Save</button></td>
                </tr>
            </table>
        </form>
    </div>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>