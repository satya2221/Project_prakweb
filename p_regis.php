<?php
    include "koneksi.php";
    $email = $_POST['email'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    $role = $_POST['role'];
    if(isset($_POST['divisi']) && isset($_POST['kid'])){
        $kid = $_POST['kid'];
        $divisi = $_POST['divisi'];
    }
    $foto = time().'_'.$_FILES['foto']['name'];
    $target = 'images/'.$foto;

    if(move_uploaded_file($_FILES['foto']['tmp_name'],$target)){
        $query = mysqli_query($link,"insert into user values ('$email','$password','$nama','$alamat','$no_telp','$foto','$role')");
        if($role!=3){
            $query2 = mysqli_query($link,"insert into staff values ('$kid','$divisi','$email')");
        }
        if($query){
            $msg = "Registrasi Berhasil";
        }
    }
    else{
        $msg = "Registrasi Gagal";
    }
?>
<html>
<head>
    <title>Proses Registrasi</title>
</head>
<body>
    <center><h2>Proses Registrasi</h2></center>
    <center><h5><?php echo $msg; ?></h5></center>
    <center><a href="home.php"><button>HOME</button></a></center>
</body>
</html>