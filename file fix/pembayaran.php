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
        $datauser = mysqli_fetch_array($query);
}
$kode_sewa = $_POST['kode_sewa'];
$tgl_kembali = $_POST['tanggal_kembali'];
$query2 = mysqli_query($link, "SELECT * from sewa s inner join kendaraan k on s.plat = k.plat where sid = '$kode_sewa'");
$data2 = mysqli_fetch_array($query2);
$no_plat = $data2['plat'];
    $tgl_sw = $data2['tgl_sewa'];
    $tgl_k = strtotime("$tgl_kembali");
    $tgl_s = strtotime("$tgl_sw");
    $diff = abs($tgl_k - $tgl_s);
    $years = floor($diff / (365*60*60*24));
    $months = floor(($diff - $years * 365*60*60*24)/(30*60*60*24));
    $lama_s = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24) / (60*60*24));

$biaya = $data2['harga']*$lama_s;
$query = mysqli_query($link, "UPDATE sewa SET tgl_kembali = '$tgl_kembali', progres = 'Selesai' where sid = '$kode_sewa'");
$query3 = mysqli_query($link,"UPDATE pembayaran SET biaya = '$biaya' where sid = '$kode_sewa'");
$query4 = mysqli_query($link,"UPDATE kendaraan SET status = 'Sedia' where plat = '$no_plat'");
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
                                if($datauser['role']=="admin"){ ?>
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
                                if($datauser['role']!="admin"){ ?>
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
                                <?php  echo $datauser['nama'];?></a>
                                <a href="logout.php"><button class="btn btn-outline-light mx-2">Logout</button></a>
                            <?php        
                            }
                            ?>
                </div>
     </nav>
  <center>
    <h1>Transaksi Berhasil</h1>
  </center>
  <table align="center" cellpadding="5px" >
      <tr>
        <td align="center"> <h4>Biaya Akhir = <?php echo "Rp".number_format($biaya,0,",",".");?></h4></td>
      </tr>
      <tr>
          <td align="center"><h6>Transaksi Selesai</h6></td>
      </tr>
      <tr>
          <td align="center"><img src="https://associationsnow.com/wp-content/uploads/2018/04/GettyImages-871179392-600x360.jpg"></td>
      </tr>
  </table>
    <center><a href="homers.php"><button class="btn btn-danger btn-lg" style="margin: 10px;">Back To Home</button></a></center>
</body>
</html>