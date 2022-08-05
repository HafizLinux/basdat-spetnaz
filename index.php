<?php
    include 'config.php';
    //$db = dbConnect();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="icon" href="assets/logohonda.png">
    <title>PT. Honda Pasir Astana</title>
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
          <a class="nav-link active" aria-current="page" href="#">
              <img src="https://ik.imagekit.io/zlt25mb52fx/ahmcdn/assets/images/logo/ahm.svg" width="100%">
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
    <div class="mt-5">

        <div class="text-center">
            <h3>
                <b>
                    Sistem Informasi Kepegawaian
                </b>
            </h3>
            <br>
            <p>
                Informasi mengenai pegawai pabrik honda, <br>
                untuk wilayah limbangan. Tepatnya di daerah Pasir Astana
            </p>
            <a href="pegawai/" class="btn btn-primary">Pegawai</a>
            <a href="admin/" class="btn btn-danger">Admin</a>
        </div>

    </div>
</div>






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>