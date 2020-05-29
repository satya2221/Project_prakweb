<?php
include "koneksi.php";
session_start();
$email = $_SESSION['email'];
$role = $_SESSION['role'];
$plat = $_POST['plat'];
$tgl_sewa = $_POST['tgl_sewa'];
$lama_sewa = $_POST['lama_sewa'];
$tgl_hrs_kembali = date('Y/m/d', strtotime($tgl_sewa . ' + ' . $lama_sewa . ' days'));
$status = "Booking";

$query = mysqli_query($link, "select * from kendaraan where plat = '$plat'");
$data = mysqli_fetch_array($query);
$biaya = $lama_sewa * $data['harga'];
$query2 = mysqli_query($link, "insert into sewa Values ('','$tgl_sewa','$lama_sewa','$tgl_hrs_kembali','','$status','$plat','$email')") or die(mysqli_error($link));
$query3 = mysqli_query($link, "UPDATE kendaraan SET status = 'Sewa' where plat = '$plat'") or die(mysqli_error($link));
if($query){
    header("location:history.php?pesan=berhasil");
}
else{
	header("location:history.php?pesan=gagal");
}
?>