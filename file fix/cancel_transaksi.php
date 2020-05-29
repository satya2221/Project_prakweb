<?php 
    include "koneksi.php";
    session_start();
    $role = $_SESSION['role'];
    $sid = $_GET['kode_sewa'];
    $plat = $_GET['plat'];
    $query2 = mysqli_query($link,"UPDATE kendaraan SET status = 'Sedia' where plat = '$plat'");
    $query = mysqli_query($link,"DELETE from sewa where sid = '$sid'");
    if($query){
        header("location:transaksi.php?proses=berhasil");
    }
    else{
        header("location:transaksi.php?proses=gagal");
    }
?>
