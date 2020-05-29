<?php 
    include "koneksi.php";
    session_start();
    if (isset($_SESSION['email'])) {
      $email = $_SESSION['email'];
      $role = $_SESSION['role'];
      $query = mysqli_query($link,"SELECT * from user where email='$email'");
      $data = mysqli_fetch_array($query);
    }
    else{
      $role = 'kosong';
    }
    $querykendaraan = mysqli_query($link,"SELECT * from kendaraan");
?>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" type="text/css" href="mob.css">
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
                    <li class="nav-item">
                      <?php 
                            if($role !="admin"){ ?>       
                            <a class="nav-link" href="Contact.php">Contact</a>
                      <?php   } ?>
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
                                <?php  echo " ".$data['nama'];?></a>
                                <a href="logout.php"><button class="btn btn-outline-light mx-2">Logout</button></a>
                            <?php        
                            }
                            ?>
                </div>
     </nav>
            <h1 align="center">List Kendaraan</h1>
    <?php if ($role == "admin") {?>
          <?php if (isset($_GET['proses'])){
                  if($_GET['proses']=="berhasil"){
            ?>
            <center><h3>Proses Berhasil</h3></center>
          <?php } 
          else {
           ?>
           <center><h3>Proses Gagal</h3></center>
          <?php } } ?>
          <center><a href="tambah_kendaraan.php"><button class="btn btn-danger">Tambah Kendaraan</button></a></center>
          <div id="content" style="margin-bottom: 18px; " >
          <?php 
            while($data = mysqli_fetch_array($querykendaraan)) {?>
           <div class="thumbnail" style="background-color: #a8dadc;">
             <img src="<?php echo $data['gambar'];?>"><!--<img src="http://via.placeholder.com/250x150">-->
             <h2><?php echo $data['merk']; ?></h2>
             <p>Plat : <?php echo $data['plat']; ?></p>
             <p>Manufaktur : <?php echo $data['brand']; ?></p>
             <p>Jenis      : <?php echo $data['jenis']; ?></p>
             <p><?php echo "Rp".number_format($data['harga'],0,",","."); ?></p>
             <a href="edit_kendaraan.php?plat=<?php echo $data['plat']; ?>"><button class="btn btn-danger">Edit</button></a>
             <a href="delete_kendaraan.php?plat=<?php echo $data['plat']; ?>"><button class="btn btn-danger">Delete</button></a>
           </div><?php }
           }?>
        </div>
    <?php if ($role == "user" || $role =="kosong" ) {?>
          <div id="content" style="margin-bottom: 18px;">
            <center>
          <p>Berikut adalah list kendaraan pada SR rental. Mulai dari motor hingga mini bus kita punya dan mudahkan anda untuk bepergian. Silakan pilih yang sesuai dengan kebutuhan anda. jangan lupa anda perlu login untuk mengakses penyewaan</p>
            </center>
            <?php 
              while($data2 = mysqli_fetch_array($querykendaraan)) {?>
                <div class="thumbnail" style="background-color: #a8dadc;">
                  <img src="<?php echo $data2['gambar'];?>"><!--<img src="http://via.placeholder.com/250x150">-->
                  <h2><?php echo $data2['merk']; ?></h2>
                  <p>Manufaktur : <?php echo $data2['brand']; ?></p>
                  <p>Jenis      : <?php echo $data2['jenis']; ?></p>
                  <p><?php echo "Rp".number_format($data2['harga'],0,",","."); ?></p>
                  <?php if ($data2['status']=="Sedia") :?>
                    <a href="rental.php?plat=<?php echo $data2['plat']; ?>&&role=<?= $role ?>">
                  <button type="button" class="btn btn-danger">Sewa</button></a>
                 <?php  ?>
                  <?php else : //($data2['status']=="Sewa") {?>
                    <a href="rental.php?plat=<?php echo $data2['plat']; ?>&&role=<?= $role ?>">
                  <button type="button" class="btn btn-danger" disabled>Sewa</button></a>
                  <?php endif;?>
                </div>
              <?php }
            }  ?>
       </div>
       <?php /*?> <!--<center>
        <table  border="1" cellpadding="5px">
           <tr>
           <?php if (isset($_SESSION['email'])) {
             if ($role=="admin") {?>
              <th>No Plat</th><?php
                  }
           }?>   
               <th>Jenis</th>
               <th>Brand</th>
               <th>Merk</th>
               <th>Harga (per Hari)</th>
               <th>Status</th>
               <td></td>
           </tr>
           <?php 
            while($data = mysqli_fetch_array($querykendaraan)) {?>
            <tr><?php if ($role=="admin") {?>
            <td><?php echo $data['plat']; ?></td> <?php } ?>
                <td><?php echo $data['jenis']; ?></td>
                <td><?php echo $data['brand']; ?></td>
                <td><?php echo $data['merk']; ?></td>
                <td><center><?php echo "Rp".number_format($data['harga'],0,",","."); ?></center></td>
                <td align="center"><?php echo $data['status']; ?></td>
                <td>
                <?php
                if($role == "user"|| $role =="kosong"){
                    if($data['status']=="Sedia"){ ?>
                <a href="rental.php?plat=<?php echo $data['plat']; ?>&&role=<?= $role ?>">
                <button><i class="fas fa-send"></i>Sewa</button></a>
                <?php    }
                }
                else{ ?>
                <a href="edit_kendaraan.php?plat=<?php echo $data['plat']; ?>"><button>Edit</button></a>
                <a href="delete_kendaraan.php?plat=<?php echo $data['plat']; ?>"><button>Delete</button></a>
                <?php }
                ?>
                </td>
            </tr>
            <?php } 
                if($role=="admin"){
            ?>
            <tr>
                <td align="center" colspan="7"><a href="tambah_kendaraan.php"><button>Tambah Kendaraan</button></a></td>
            </tr>
                <?php } ?>
        </table>
      </center><?php */?>
</body>
</html>