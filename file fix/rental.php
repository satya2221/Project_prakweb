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
    if(isset($_GET['plat'])){
        $plat = $_GET['plat'];
        $querykendaraan = mysqli_query($link,"SELECT * from kendaraan where plat = '$plat'");
        $data2 = mysqli_fetch_array($querykendaraan);
    }
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
                       <a class="nav-link" href="Contact.html">Contact</a>
                    </li>
                    </ul>
                    
                        <?php 
                            if(empty($_SESSION['email'])){
                        ?>
                            <a href="login.php"><button class="btn btn-outline-lightmx-2">Login</button></a>
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
            <h1>Rental <?php echo $data2['brand']." ".$data2['merk']." "?></h1>
        </center>
    <form method="post" action="lanjut_sewa.php">

<?php
    if(isset($_GET['plat'])){
        $query = mysqli_query($link,"SELECT * from kendaraan where plat = '$plat'");
        $data = mysqli_fetch_array($query);
?>
<div class="container">
    <div class="row">
    <div class="col-2"></div>
    <div class="col-8" align="right">
           <table align="center" class="table table-striped" cellpadding="5px">
            <thead class="table-dark">
            <tr>
                <th colspan="2" style="text-align: center;">Informasi Kendaraan</th>
                <input type="hidden" name="plat" value="<?php echo $data['plat']; ?>">
            </tr>
            </thead>
            <tr>
                <td>No. Plat</td>
                <td><?php echo $data['plat']; ?></td>
            </tr>
            <tr>
                <td>Jenis</td>
                <td><?php echo $data['jenis']?></td>
            </tr>
            <tr>
                <td>Brand</td>
                <td><?php echo $data['brand']?></td>
            </tr>
            <tr>
                <td>Merk</td>
                <td><?php echo $data['merk']?></td>
            </tr>
            <tr>
                <td>Harga Sewa (per hari)</td>
                <td><?php echo "Rp".number_format($data['harga'],0,",",".");?></td>
            </tr>
            </table>
        </div>
    </div>
</div>
        <?php } ?>
   <br><br>
   <div class="container">
    <div class="row">
    <div class="col-4"></div>
    <div class="col-4" align="right">
    <table align="center" class="table table-striped" cellpadding="5px">
            <tr>
                <td>Tanggal Booking</td>
                <td><input type="date" name="tgl_sewa" required min="<?php echo date('Y-m-d');?>"></td>
            </tr>
            <tr>
                <td>Lama sewa (hari)</td>
                <td><input type="number" name="lama_sewa" min="1" required></td>
            </tr>
        <tr>
            <td align="center"><input type="reset" value="Ulang" class="btn btn-info"></td>
            <td align="center" colspan="2"><input type="submit" value="Kirim" class="btn btn-danger"></td>
        </tr>
    </table>
        </div>
    </div>
</div>
    </form>
</body>
</html>