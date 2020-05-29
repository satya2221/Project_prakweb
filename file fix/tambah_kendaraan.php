<?php
    include "koneksi.php";
    session_start();
    if (empty($_SESSION['email'])) {
        header("location:login.php?pesan=belum_login");
    }
    if (isset($_SESSION['email'])) {
      $email = $_SESSION['email'];
      $role = $_SESSION['role'];
      $query = mysqli_query($link,"SELECT * from user where email='$email'");
      $data = mysqli_fetch_array($query);
    }
?>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" type="text/css" href="all.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <title>Tambah Kendaraan</title>
    </head>
    <body style="background-color: aliceblue;">
        <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="homers.php"><img src="logo.svg" width="30" height="30"></a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item ">
                      <a class="nav-link" href="homers.php">Home<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                      <a class="nav-link" href="mobil.php">Kendaraan</a>
                    </li>
                    <li>
                        <?php 
                            if(isset($_SESSION['email'])){
                                if($data['role']=="admin"){ ?>
                                    <a class="nav-link" href="transaksi.php">Transaksi</a>
                        <?php   }
                                else if (isset($_SESSION['email'])){ 
                                    if ($role=="user"){?>
                                    <a class="nav-link" href="history.php">History</a>
                        <?php        }
                                }
                            }
                        ?>
                    </li>
                    <li>
                        <?php 
                            if(isset($_SESSION['email'])){
                                if($data['role']!="admin"){ ?>
                                    <a class="nav-link" href="Contact.php">Contact</a>
                        <?php   } 
                            }?>
                    </li>
                    </ul>
                    
                        <?php 
                            if(empty($_SESSION['email'])){
                        ?>
                            <a href="login.php"><button class="btn btn-outline-light mx-2">Login</button></a>
                           <!-- <a href="per_regis.php"><button class=" btn btn-outline-dark mx-1">Registrasi</button></a>-->
                        <?php
                 //   header("location:home.php?pesan=belum_login");
                            }
                            else{ ?><div style="color: white;"> Hello, </div> <a href="profile.php" style="color: orange;">
                                <?php  echo $data['nama'];?></a>
                                <a href="logout.php"><button class="btn btn-outline-light mx-2">Logout</button></a>
                            <?php        
                            }
                            ?>
                </div>
        </nav>
     <center><h2>Kendaraan</h2></center>
     <div class="container">
     <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
           <form action="p_kendaraan.php" method="POST">
                Gambar(link)<input  class="form-control" type="text" name="img" ><br>
                No-Plat    <input class="form-control" type="text" name="plat" required><br>
                Jenis    <input class="form-control" type="text" name="jenis" required id=""><br>
                Brand    <input class="form-control" type="text" name="brand" required id=""><br>
                Merk <input class="form-control" type="text" name="merk" required id=""> <br>
                Harga    <input class="form-control" type="text" name="harga" required="" id=""><br>
                Tanggal <input class="form-control" type="date" name="input" required min="<?php echo date('Y-m-d');?>" ><br>
                <input type="hidden" name="status" value="Sedia">
                <input type="submit" value="Tambah" class="btn btn-danger" style="margin:auto;
  display:block;">
            </form>
        </div>
    </div>
    </div>    
       <!-- <table align="center">
        <form action="p_regis.php" method="post" enctype="multipart/form-data">
            <tr><td>Email</td></tr>
            <tr><td><input type="text" name="email" placeholder="Email"></td></tr>
            <tr><td>Password</td></tr>
            <tr><td><input type="password" name="password" Placeholder="Password">
               <td> <small>Max 10 character</small></td>
            </td></tr>
            <tr><td>Nama</td></tr>
            <tr><td><input type="text" name="nama" placeholder="Nama Lengkap"></td></tr>
            <tr><td>Alamat</td></tr>
            <tr><td><textarea name="alamat" cols="30" rows="5"></textarea></td></tr>
            <tr><td>No. HP</td></tr>
            <tr><td><input type="text" name="no_telp" placeholder="No. HP Aktif"></td></tr>
            <tr><td>Foto Profil</td></tr>
            <tr><td>
             <img src="images/holder.png" id="fotoprofil" onclick="triggerClick()" 
        style="display:block;"> di input = onchange="displayImage(this)" 
                <input type="file" name="foto" id="foto">
            </td></tr>
            <tr>
                <td><input type="hidden" name="role" value="<?php echo $role; ?>"></td>
                <?php if(isset($kid) && isset($divisi)) {?>
                <td><input type="hidden" name="kid" value="<?php echo $kid; ?>"></td>
                <td><input type="hidden" name="divisi" value="<?php echo $divisi; ?>"></td>
                <?php }  ?>
            </tr>
            <tr><td align="center"><input type="submit" value="Registrasi"></td></tr>
        </form>
        </table>-->

<!--    <script scr="coba.js"></script> -->
</body>
</html>