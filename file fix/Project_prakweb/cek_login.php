<?php 
    session_start();
    include "koneksi.php";
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $query = mysqli_query($link,"select * from user where email='$email' and password='$password'") or die (mysqli_error($link));
    $cek = mysqli_num_rows($query);
    if($cek >0){
        $_SESSION['email'] = $email;
        $_SESSION['status'] = "login";
        header("location:home.php");
    }
    else{
        header("location:login.php?pesan=gagal");
    }
?>