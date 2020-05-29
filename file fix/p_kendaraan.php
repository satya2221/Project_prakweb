<?php
    include "koneksi.php";
    session_start();
    $email = $_SESSION['email'];
    
    $plat = $_POST['plat'];
    $jenis = $_POST['jenis'];
    $brand = $_POST['brand'];
    $merk = $_POST['merk'];
    $harga = $_POST['harga'];
    $tanggal = $_POST['input'];
    $status = $_POST['status'];
    $img = $_POST['img'];

  //  $query3 = mysqli_query($link,"select * from staff where email = '$email'");
   // $data = mysqli_fetch_array($query3);
   // $kid = $data['kid'];
 //   $foto = time().'_'.$_FILES['foto']['name'];
 //   $target = 'images/'.$foto;

  //  if(move_uploaded_file($_FILES['foto']['tmp_name'],$target)){
  //      $query = mysqli_query($link,"insert into user values ('$email','$password','$nama','$alamat','$no_telp','$foto','$role')");
   //     if($role!=3){
   //         $query2 = mysqli_query($link,"insert into staff values ('$kid','$divisi','$email')");
  //      }
    $query = mysqli_query($link,"insert into kendaraan values ('$plat','$jenis','$brand','$merk','$harga','$img','$status')");
    $query2 = mysqli_query($link,"insert into input_mobil values ('$kid','$plat','$tanggal')");
    if($query){
            header("location:mobil.php?proses=berhasil");
        }
   // }
    else{
        header("location:mobil.php?proses=gagal");
    }
?>