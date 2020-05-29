<?php
    include "koneksi.php";
    session_start();
    if (empty($_SESSION['email'])) {
        header("location:login.php?pesan=belum_login");
    }
    if(isset($_SESSION['email'])){
        $email = $_SESSION['email'];
        $role = $_SESSION['role'];
        $queryuser = mysqli_query($link,"SELECT * from user where email='$email'");
        $datauser = mysqli_fetch_array($queryuser);
    }
  //  $email = $_SESSION['email'];
    $sid = $_GET['kode_sewa'];
    $query = mysqli_query($link,"SELECT * from sewa s inner join user u on penyewa = u.email inner join kendaraan k on s.plat = k.plat where sid = '$sid'");
    $data = mysqli_fetch_array($query);
    $query2 = mysqli_query($link,"SELECT * from pembayaran b inner join staff f on b.kid = f.kid inner join user u on f.email = u.email where sid = '$sid'");
    $data2 = mysqli_fetch_array($query2);
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
            <h1>Laporan Transaksi <?php if($role="admin"){ echo "SID ".$sid; }?></h1>
    </center>
    <div class="container">
    <div class="row" style="margin-bottom: 18px;">
        <div class="col-1"></div>
        <div class="col-10" align="right">
        <table align="center"  cellpadding="5px" cellspacing="5px" class="table table-striped table-bordered">
            <thead class="table-dark">
            <tr>
                <td colspan="2" align="center">Penyewa</td>
                <td colspan="2" align="center">Kendaraan</td>
                <td colspan="2" align="center">Transaksi</td>
            </tr>
            </thead>
            <tr>
                <td>Email</td>
                <td><?php echo $data['email'];?></td>
                <td>No Plat</td>
                <td><?php echo $data['plat'];?></td>
                <td>Tanggal Sewa</td>
                <td><?php 
                    $tgl_s = $data['tgl_sewa'];
                    $tgl_sewa = date("d M Y",strtotime($tgl_s));
                    echo $tgl_sewa; ?></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><?php echo $data['nama'];?></td>
                <td>Jenis Kendaraan</td>
                <td><?php echo $data['jenis'];?></td>
                <td>Lama Sewa</td>
                <td><?php echo $data['lama_sewa']." hari";?></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><?php echo $data['alamat'];?></td>
                <td>Brand (Merk)</td>
                <td><?php echo $data['brand']." (".$data['merk'].")";?></td>
                <td>Tanggal Harus Kembali</td>
                <td><?php 
                    $tgl_hk = $data['tgl_hrs_kembali'];
                    $tgl_hrs_k = date("d M Y",strtotime($tgl_hk));
                    echo $tgl_hrs_k; ?></td>
            </tr>
            <tr>
                <td>No. Telp</td>
                <td><?php echo $data['no_telp'];?></td>
                <td>Harga Sewa (per hari)</td>
                <td><?php echo "Rp".number_format($data['harga'],0,",","."); ?></td>
                <td>Tanggal Kembali</td>
                <td><?php
                        if($data['tgl_kembali'] != '0000-00-00'){
                        $tgl_k = $data['tgl_kembali']; 
                        $tgl_back = date("d M Y", strtotime($tgl_k));
                        echo $tgl_back; }
                        else{
                            echo "Belum Kembali";
                        }
                    ?></td>
            </tr>
            <tr><?php if($data['progres']!="Booking"){?>
            <td style="text-align: center;" colspan="4">Karyawan</td><?php } ?>
                <td>Total Biaya</td>
                <td><?php 
                        if($data['progres']!="Selesai"){
                        $biaya = $data['lama_sewa']*$data['harga'];
                        echo  "Rp".number_format($biaya,0,",",".");    }
                        else {
                            echo "Rp".number_format($data2['biaya'],0,",",".");
                        }
                        ?>
                        </td>
            </tr>
            <tr>
                <?php if($data['progres']!="Booking"){?>
                    <td colspan="2">Nama Karyawaan</td>
            <td colspan="2"><?php echo $data2['nama']; ?></td><?php } ?>
                <td rowspan="2">Status Transaksi</td>
                <td rowspan="2" align="center" style="background:yellow"><?php
                        if($data['tgl_kembali'] != '0000-00-00'){
                        echo "Selesai"; }
                        else{
                            echo $data['progres'];
                        }
                    ?></td>
            </tr>
            <tr><?php if($data['progres']!="Booking"){?>
                <td colspan="2">No. HP Karyawan</td>
                <td colspan="2"><?php echo $data2['no_telp']; ?></td><?php } ?>
            
            </tr>
        </table>
        <center>
        <?php if ($datauser['role']!="admin") : ?>
            <a href="history.php"><button class="btn btn-danger">Back</button></a>
        <?php else :  ?>
            <a href="transaksi.php"><button class="btn btn-danger">Back</button></a>
        <?php endif; ?>    
        
        </center>
    </div>
</div>
</div>
    </body>
</html>