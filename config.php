<?php

    // Koneksi
    function dbConnect(){
        $connection = mysqli_connect("localhost", "root", "", "Spetnaz_IF6_Kepegawaian");
        if (!$connection) {
            die("Koneksi Gagal");
        }
        return $connection;
    }
    // Koneksi

?>