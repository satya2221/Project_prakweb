<?php
    include "koneksi.php";
    $plat_lama = $_POST['plat_lama'];
    $plat = $_POST['plat'];
    $jenis = $_POST['jenis'];
    $brand = $_POST['brand'];
    $merk = $_POST['merk'];
    $harga = $_POST['harga'];
    $gambar = $_POST['img'];
 //   $foto = time().'_'.$_FILES['foto']['name'];
 //   $target = 'images/'.$foto;

  //  if(move_uploaded_file($_FILES['foto']['tmp_name'],$target)){
  //      $query = mysqli_query($link,"insert into user values ('$email','$password','$nama','$alamat','$no_telp','$foto','$role')");
   //     if($role!=3){
   //         $query2 = mysqli_query($link,"insert into staff values ('$kid','$divisi','$email')");
  //      }
    $query = mysqli_query($link,"UPDATE kendaraan set plat = '$plat',jenis = '$jenis', brand = '$brand',merk = '$merk', harga = '$harga' gambar='$gambar' where plat = '$plat_lama'");
        if($query){
            header("location:mobil.php?proses=berhasil");
        }
   // }
    else{
        header("location:mobil.php?proses=gagal");
    }
?>