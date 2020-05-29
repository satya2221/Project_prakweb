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
$querykendaraan = mysqli_query($link, "SELECT * from sewa s inner join kendaraan k on s.plat = k.plat inner join user u on penyewa = email order by s.tgl_sewa ASC");
?>

<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Rental Mobil</title>
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
                    <li class=" nav-item active">
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
        <h1 style="margin-bottom: 20px;">Daftar Transaksi</h1>
        <?php if (isset($_GET['proses'])){
                  if($_GET['proses']=="berhasil"){
            ?>
            <center><h3>Proses Berhasil</h3></center>
          <?php } 
          else {
           ?>
           <center><h3>Proses Gagal</h3></center>
          <?php } } ?>
    </center>
    <div class="container">
    <div class="row" style="margin-bottom: 18px;">
        <div class="col-1"></div>
        <div class="col-10" align="right">
    <table align="center" cellpadding="5px" class="table table-striped">
        <thead class="table-dark">
        <tr>
            <th>ID Sewa</th>
            <th>Penyewa</th>
            <th>No. Plat</th>
            <th>Tanggal Sewa</th>
            <th>Lama Sewa</th>
            <th>Tanggal Harus Kembali</th>
            <th>Tanggal Kembali</th>
            <th>Status</th>
            <th></th>
        </tr>
        </thead>
        <?php while ($data = mysqli_fetch_array($querykendaraan)) { ?>
            <tr align="center">
                <td><?php echo $data['sid']; ?></td>
                <td><?php echo $data['nama']; ?></td>
                <td><?php echo $data['plat']; ?></td>
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
                   <?php if ($data['progres'] == 'Sewa') {?>
                        <a href="update_transaksi.php?kode_sewa=<?php echo $data['sid']; ?>"><button class="btn btn-danger btn-sm">Bayar</button></a>
                    <?php } else if ($data['progres'] == 'Booking') {?>
                        <a href="konfirmasi_sewa.php?kode_sewa=<?php echo $data['sid']; ?>"><button class="btn btn-danger btn-sm">Konfirmasi</button></a>
                        <a href="cancel_transaksi.php?kode_sewa=<?php echo $data['sid']; ?>&plat=<?php echo $data['plat']; ?>"><button class="btn btn-danger btn-sm" style="margin-top: 5px;">Cancel</button></a>
                    <?php } ?>
                    <a href="detail_transaksi.php?kode_sewa=<?php echo $data['sid']; ?>"><button class="btn btn-danger btn-sm" style="margin-top: 5px;">Detail</button></a>
                </td>
            </tr>
        <?php } ?>
    </table>
        </div>
    </div>
    </div>
</body>

</html>