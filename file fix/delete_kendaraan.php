<?php
    include "koneksi.php";
    $plat = $_GET['plat'];
    session_start();
    if(isset($_SESSION['email'])){
        $email = $_SESSION['email'];
        $role = $_SESSION['role'];
        $query = mysqli_query($link,"SELECT * from user where email='$email'");
        $data = mysqli_fetch_array($query);
    }
    $query = mysqli_query($link,"DELETE from kendaraan where plat = '$plat'");
        if($query){
            header("location:mobil.php?proses=berhasil");
        }
   // }
    else{
        header("location:mobil.php?proses=gagal");
    }
?>
