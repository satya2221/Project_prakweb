<?php
    include "koneksi.php";
    $email_lama = $_POST['email_lama'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
 //   $foto = time().'_'.$_FILES['foto']['name'];
 //   $target = 'images/'.$foto;

  //  if(move_uploaded_file($_FILES['foto']['tmp_name'],$target)){
  //      $query = mysqli_query($link,"insert into user values ('$email','$password','$nama','$alamat','$no_telp','$foto','$role')");
   //     if($role!=3){
   //         $query2 = mysqli_query($link,"insert into staff values ('$kid','$divisi','$email')");
  //      }
    $query = mysqli_query($link,"Update user set email = '$email',password = '$password', nama = '$nama', alamat = '$alamat', no_telp = '$phone' where email = '$email_lama'");
        if($query){
            header("location:profile.php?proses=berhasil");
        }
   // }
    else{
        header("location:profile.php?proses=gagal");
    }
?>