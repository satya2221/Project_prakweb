<?php
include "koneksi.php";
session_start();
if (empty($_SESSION['email'])) {
        header("location:login.php?pesan=belum_login");
    }
if(isset($_SESSION['email'])){
        $email = $_SESSION['email'];
        $role = $_SESSION['role'];
        $query = mysqli_query($link,"SELECT * from user where email='$email'");
        $data = mysqli_fetch_array($query);
}
$queryhis = mysqli_query($link, "SELECT * from sewa s inner join kendaraan k on s.plat = k.plat inner join user u on penyewa = email where penyewa = '$email' order by s.tgl_sewa ASC");
?>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Rental Mobil</title>
    <link rel="stylesheet" type="text/css" href="all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body style="background-color: aliceblue;">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="homers.php"><img src="logo.svg" width="30" height="30"></a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                      <a class="nav-link" href="homers.php">Home<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="mobil.php">Kendaraan</a>
                    </li>
                    <li class="nav-item active">
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
                            else{ ?> <div style="color: white;"> Hello, </div> <a href="profile.php" style="color: orange;">
                                <?php  echo $data['nama'];?></a>
                                <a href="logout.php"><button class="btn btn-outline-light mx-2">Logout</button></a>
                            <?php        
                            }
                            ?>
                </div>
     </nav>
    <center>
        <h1>Daftar Transaksi</h1>
    </center>
    <?php if (isset($_GET['pesan'])){
                  if($_GET['pesan']=="berhasil"){
            ?>
            <center><h3>Transaksi Berhasil</h3></center>
          <?php } 
          else {
           ?>
           <center><h3>Transaksi Gagal</h3></center>
          <?php } } ?>
    <div class="container">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10" align="right">
        <center>
        <p>Berikut daftar transaksi yang sudah anda lakukan bersama kami. Detail lengkap dari transaksi tersebut sudah tersedia dengan click tombol detail yang tersedia pada tiap transaksi</p>
        </center>
    <table align="center"  class="table table-striped" style="text-align: center;">
        <thead class="table-dark">
        <tr>
            <th>Kendaraan</th>
            <th>Tanggal Sewa</th>
            <th>Lama Sewa</th>
            <th>Tanggal Harus Kembali</th>
            <th>Tanggal Kembali</th>
            <th>Status</th>
            <th></th>
        </tr>
        </thead>
        <?php while ($data = mysqli_fetch_array($queryhis)) { ?>
            <tr align="center">
                <td><?php echo $data['jenis']." (".$data['brand']." | ".$data['merk'].")"; ?></td>
                <td><?php
                        $tgl_s = $data['tgl_sewa'];
                        $tgl_sewa = date("d M Y", strtotime($tgl_s));
                        echo $tgl_sewa;
                        ?></td>
                <td><?php echo $data['lama_sewa']; ?></td>
                <td><?php
                        $tgl_hk = $data['tgl_hrs_kembali'];
                        $tgl_hrs_k = date("d M Y", strtotime($tgl_hk));
                        echo $tgl_hrs_k; ?>
                </td>
                <td><?php
                        if($data['tgl_kembali'] != '0000-00-00'){
                        $tgl_k = $data['tgl_kembali']; 
                        $tgl_back = date("d M Y", strtotime($tgl_k));
                        echo $tgl_back; }
                        else{
                            echo "-";
                        }
                    ?></td>
                <td><?php echo $data['progres'];?></td>
                <td>
                    <a href="detail_transaksi.php?kode_sewa=<?php echo $data['sid']; ?>"><button type="button" class="btn btn-danger">Detail</button></a>
                </td>
            </tr>
        <?php } ?>
    </table>
        </div>
    </div>
    </div>
</body>
</html>