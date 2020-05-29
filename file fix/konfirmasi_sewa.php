<?php 
include "koneksi.php";
session_start();
$email = $_SESSION['email'];
$sid = $_GET['kode_sewa'];
$query = mysqli_query($link,"update sewa set progres = 'Sewa' where sid = '$sid'");
$query2 = mysqli_query($link,"select * from staff s inner join user u on s.email = u.email where s.email = '$email'");
$data = mysqli_fetch_array($query2);
$kid = $data['kid'];
$query3 = mysqli_query($link,"insert into pembayaran values ('','','$sid','$kid')");
if ($query==TRUE && $query3==TRUE){
    header("location:transaksi.php");
}

?>