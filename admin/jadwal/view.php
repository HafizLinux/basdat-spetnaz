<?php
    include '../../config.php';
    $db = dbConnect();

    $sqlViewPgw = "SELECT * FROM jadwalKerja";
    $execPgw = $db->query($sqlViewPgw);

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

            <table class="table">
                <tr>
                    <th>No</th>
                    <th>Hari Kerja</th>
                    <th>Jam Kerja</th>
                    <th>Action</th>
                </tr>

                <?php $i = 1; foreach($execPgw as $resPgw):?>
                <tr>
                    <td><?= $i++?></td>
                    <td><?= $resPgw['hari_kerja']?></td>
                    <td><?= $resPgw['jam_kerja']?></td>
                    <td>
                        <a href="edit.php?id=<?= $resPgw['id_jadwal_kerja']?>" class="btn btn-primary">Edit</a>
                        <a href="delete.php?id=<?= $resPgw['id_jadwal_kerja']?>" class="btn btn-danger" onclick="return confirm('Yakin Hapus Data Jadwal?')">Delete</a>
                    </td>
                </tr>
                <?php endforeach;?>
            </table>
            

        </div>
    </div>
    




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>