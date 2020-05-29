<?php 
    session_start();
    include "koneksi.php";
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $query = mysqli_query($link,"SELECT * from user where email='$email' and password='$password'") or die (mysqli_error($link));
    $data = mysqli_fetch_array($query);
    $role = $data['role'];
    $cek = mysqli_num_rows($query);
    if($cek >0){
        $_SESSION['email'] = $email;
        $_SESSION['role'] = $role;
        $_SESSION['status'] = "login";
        header("location:homers.php");
    }
    else{
        header("location:login.php?pesan=gagal");
    }
?>