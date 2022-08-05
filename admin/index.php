<?php
    session_start();
    if(!isset($_SESSION['admin'])){
        echo "
            <script>
                alert('Login Dulu Brodiii!!');
                document.location.href = '../login.php';
            </script>
        ";
    }
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

    <div class="judul mt-5">
        <h3>Admin Page</h3>
    </div>

    <table class="table mt-5">
        
        <tr> 
            <th>No</th>
            <th>Data</th>
            <th>Action</th>
        </tr>

        <tr>
            <th>1</th>
            <td>Data Pegawai</td>
            <td>
                <a href="pegawai/insert.php" class="btn btn-primary">Tambah</a>
                <a href="pegawai/view.php" class="btn btn-danger">View, Update, Delete</a>
            </td>
        </tr>

        <tr>
            <th>2</th>
            <td>Data Jadwal Kerja</td>
            <td>
                <a href="jadwal/insert.php" class="btn btn-primary">Tambah</a>
                <a href="jadwal/view.php" class="btn btn-danger">View, Update, Delete</a>
            </td>
        </tr>

        <tr>
            <th>3</th>
            <td>Data Jabatan</td>
            <td>
                <a href="jabatan/insert.php" class="btn btn-primary">Tambah</a>
                <a href="jabatan/view.php" class="btn btn-danger">View, Update, Delete</a>
            </td>
        </tr>

        <tr>
            <th>4</th>
            <td>Data Golongan</td>
            <td>
                <a href="golongan/insert.php" class="btn btn-primary">Tambah</a>
                <a href="golongan/view.php" class="btn btn-danger">View, Update, Delete</a>
            </td>
        </tr>

        <tr>
            <th>5</th>
            <td>Penggajian Pegawai</td>
            <td>
                <a href="penggajian/insert.php" class="btn btn-primary">Tambah</a>
                <a href="penggajian/view.php" class="btn btn-danger">View, Delete</a>
            </td>
        </tr>

    </table>    


</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>