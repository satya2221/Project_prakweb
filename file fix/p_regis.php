<?php
    include "koneksi.php";
    $email = $_POST['email'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['nomer'];
    $role = $_POST['role'];
 //   $foto = time().'_'.$_FILES['foto']['name'];
 //   $target = 'images/'.$foto;

  //  if(move_uploaded_file($_FILES['foto']['tmp_name'],$target)){
  //      $query = mysqli_query($link,"insert into user values ('$email','$password','$nama','$alamat','$no_telp','$foto','$role')");
   //     if($role!=3){
   //         $query2 = mysqli_query($link,"insert into staff values ('$kid','$divisi','$email')");
  //      }
    $query = mysqli_query($link,"INSERT into user values ('$email','$password','$nama','$alamat','$no_telp','$role')");
        if($query){
            $msg = "Registrasi Berhasil";
            header("location:login.php?pesan=regisberhasil");
        }
   // }
    else{
        $msg = "Registrasi Gagal";
        header("location:login.php?pesan=regisgagal");
    }
?>
