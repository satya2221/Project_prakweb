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
$kode_sewa = $_GET['kode_sewa'];
$query = mysqli_query($link, "SELECT * from sewa where sid='$kode_sewa'");
$data = mysqli_fetch_array($query);
?>

<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Rental Mobil</title>
    <link rel="stylesheet" type="text/css" href="all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <title>Rental Mobil</title>
</head>
<body>
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
    <h1>Pembayaran transaksi<?php echo " ". $data['sid']; ?></h1>
  </center>
  <div class="container">
    <div class="row" style="margin-bottom: 18px;">
        <div class="col-3"></div>
        <div class="col-6" align="right">
  <table align="center" cellpadding="5px" class="table table-striped">
    <form action="pembayaran.php" method="POST">
      <input type="hidden" name="kode_sewa" value="<?php echo $data['sid']; ?>">
      <thead class="table-dark">
      <tr>
        <td colspan="2" align="center">Update Transaksi</td>
      </tr>
      </thead>
      <tr>
        <td>Kode Sewa</td>
        <td><?php echo $data['sid']; ?></td>
      </tr>
      <tr>
        <td>No Plat</td>
        <td><?php echo $data['plat']; ?></td>
      </tr>
      <tr>
        <td>Tanggal Sewa</td>
        <td><?php $tgl_s = $data['tgl_sewa'];
            $tgl_sewa = date("d M Y", strtotime($tgl_s));
            echo $tgl_sewa; ?></td>
      </tr>
      <tr>
        <td>Tanggal Kembali</td>
        <td><input type="date" name="tanggal_kembali" required min="<?php echo date('Y-m-d');?>"></td>
      </tr>
      <tr>
        <td align="center"><input type="reset" value="Ulang" class="btn btn-info"></td>
        <td align="center"><input type="submit" value="Bayar" class="btn btn-danger"></td>
      </tr>
    </form>
  </table>
</div>
</div>
</div>
</body>

</html>