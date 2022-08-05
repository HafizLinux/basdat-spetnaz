<?php

    session_start();
    if(isset($_SESSION['admin'])){
        echo "
            <script>
                document.location.href = 'admin/';
            </script>
        ";
    }

    if(isset($_SESSION['pegawai'])){
        echo "
            <script>
                document.location.href = 'pegawai/';
            </script>
        ";
    }

    include 'config.php';
    $db = dbConnect();

    if (isset($_POST['login'])) {
        $username = $_POST['idlogin'];
        $password = $_POST['password'];

        $sqlQueryEmailAdmin = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
        $executeQueryEmailAdmin = $db->query($sqlQueryEmailAdmin);

        if (mysqli_num_rows($executeQueryEmailAdmin) > 0) {
            $_SESSION['admin'] = true;
            $_SESSION['username'] = $username;
            echo "
                <script>
                    alert('Login Admin Sukses!!!');
                    document.location.href = 'admin/';
                </script>
            ";
        }else{
            $sqlQueryUser = "SELECT * FROM pegawai WHERE email = '$username' AND password = '$password'";
            $executeQuery = $db->query($sqlQueryUser);

            if (mysqli_num_rows($executeQuery) > 0) {
                $_SESSION['pegawai'] = true;
                $_SESSION['username'] = $username;
                echo "
                    <script>
                        alert('Login Pegawai Sukses!!!');
                        document.location.href = 'pegawai/';
                    </script>
                ";
            }else{
                echo "
                    <script>
                        alert('ID / Password Salah');
                        document.location.href = 'login.php';
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
    <link rel="icon" href="assets/logohonda.png">
    <title>Login</title>
</head>
<body>



    <div class="container mt-5 pt-5">
        <div class="row">
            <div class="col-sm-4 mb-3"></div>
            <div class="col-sm-4 mb-3">
                <div class="card">
                    <div class="container card-title mt-2">
                        <img src="assets/logohonda.png" width="20%">
                    </div>
                    <div class="card-body">
                        <form action="" method="POST"> 
                            <div class="mb-3 mt-3">
                                <input type="text" class="form-control" placeholder="Username" name="idlogin">
                            </div>
                            <div class="mb-3 mt-4">
                                <input type="password" class="form-control" placeholder="Password" name="password">
                            </div>
                            <button type="submit" class="btn btn-primary" name="login">Login</button>
                        </form>
                        <br>
                        <a href="index.php" class="btn">Back</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 mb-3"></div>
        </div>
    </div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>    
</body>
</html>